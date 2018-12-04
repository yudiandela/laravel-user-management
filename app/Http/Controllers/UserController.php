<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Pyaesone17\ActiveState\Active;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = $user->paginate(10);
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
            'username' => ['required', 'alpha_dash', 'min:3', 'max:255', 'unique:users,username'],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => '$2y$10$NQUIWcXCKAkywZrEh1YE4.jyAVgTWsmg4/lIAuu94oCoGXrgkByaC', // 123456,
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Berhasil menambahkan data user ' . $user->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
        ]);

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->username = $request->username;
        $user->role     = $request->role;
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

        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data user ' . $user->name);
    }
}
