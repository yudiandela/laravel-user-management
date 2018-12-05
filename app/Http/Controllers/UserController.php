<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Pyaesone17\ActiveState\Active;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = $user->where('id', '>', 1)->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'min:3', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'username' => ['required', 'alpha_dash', 'min: 3', 'max:255', 'unique:users,username'],
            'photo'    => ['required', 'mimes:jpeg,bmp,png,gif'],
        ]);

        $photo = '';

        if ($request->hasFile('photo')) {
            $photo = $this->uploadImage($request->file('photo'));
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'photo'    => $photo,
            'password' => '$2y$10$NQUIWcXCKAkywZrEh1YE4.jyAVgTWsmg4/lIAuu94oCoGXrgkByaC', // 123456,
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Berhasil menambahkan data user ' . $user->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => ['required', 'string', 'min:3', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'username' => ['required', 'alpha_dash', 'min:3', 'max:255', 'unique:users,username,'.$user->id],
            'photo'    => ['mimes:jpeg,bmp,png,gif'],
        ]);

        $photo = $user->photo;

        if ($request->hasFile('photo')) {
            Storage::delete('public/images/' . $user->photo);
            $photo = $this->uploadImage($request->file('photo'));
        }

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->username = $request->username;
        $user->role     = $request->role;
        $user->photo    = $photo;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Berhasil mengubah data user ' . $user->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == 1 or $user->role <= 3) {
            return redirect()->back()->with('failed', 'Tidak dapat menghapus data ' . $user->roleString());
        }

        Storage::delete('public/images/' . $user->photo);
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data user ' . $user->name);
    }

    /**
     * Single image Upload
     *
     * @param [type] $image
     * @return string
     */
    protected function uploadImage($image)
    {
        $imageOriginalName = $image->getClientOriginalName();
        $imageExt          = $image->getClientOriginalExtension();
        $imageName         = pathinfo($imageOriginalName, PATHINFO_FILENAME);
        $imageFullName     = str_slug($imageName) . '-' . time() . '.' . $imageExt;

        $image->storeAs('public/images', $imageFullName);

        return $imageFullName;
    }

    /**
     * Activation user
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function userActivation(User $user)
    {
        $activation = $user->email_verified_at;

        if ($activation === null) {
            $user->email_verified_at = now();
        } else {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->back()->with('success', "User $user->name status has been changed successfully");
    }
}
