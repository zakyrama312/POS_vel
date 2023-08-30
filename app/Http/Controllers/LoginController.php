<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    function admin()
    {
        return view('admin.dashboard.index');
    }
}
