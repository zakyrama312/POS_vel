<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    function admin()
    {
        return view('admin.dashboard.index');
    }
    function petugas()
    {
        return view('petugas.dashboard.index');
    }
}
