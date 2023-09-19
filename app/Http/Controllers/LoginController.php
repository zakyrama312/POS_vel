<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    function admin()
    {
        $date = date('Y-m-d');
        $total = Order::all()
            ->where('periode', $date)
            ->sum('total');
        $laba = Order::all()
            ->where('periode', $date)
            ->sum('laba');
        return view('admin.dashboard.index', compact('total', 'laba'));
    }
    function petugas()
    {
        return view('petugas.dashboard.index');
    }
}
