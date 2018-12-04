<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show index view in admin dashboard
     *
     * @return void
     */
    public function index()
    {
        return view('admin.index');
    }
}
