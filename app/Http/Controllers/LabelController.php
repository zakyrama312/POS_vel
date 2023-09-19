<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = date('Y-m-d');
        $order = DB::table('orders')
            ->where('orders.periode', $date)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->select(DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.stok_awal', 'products.stok_akhir', 'products.harga_jual')
            ->orderBy('orders.invoice')
            ->groupBy('orders.id_penitip')
            ->get();
        return view('petugas.dashboard.label', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
