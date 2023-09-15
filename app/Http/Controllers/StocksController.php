<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use App\Http\Requests\StoreStocksRequest;
use App\Http\Requests\UpdateStocksRequest;
use App\Models\Products;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = Products::all();
        return view('admin.stocks.index', compact('stok'));
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
    public function store(StoreStocksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stocks $stocks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stocks $stocks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStocksRequest $request, Stocks $stocks, $id)
    {

        $data = Products::find($id);
        $idbarang = $data-> id_barang;
        $stokmasuk = $request->inputstok;
        $datastok = $data->stok_awal;
        $hasil = $stokmasuk + $datastok;
        $sisa = $data-> stok_akhir + $stokmasuk;
        $data->stok_awal   = $hasil;
        $data->stok_akhir = $sisa;
        Products::where('id', $id)
        ->update([
            'stok_awal' => $hasil,
            'stok_akhir' => $sisa,
        ]);
        Stocks::where('id_barang', $idbarang)
        ->update([
            'stok_awal' => $hasil,
            'stok_akhir' => $sisa,
        ]);
        return redirect('stocks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stocks $stocks)
    {
        //
    }
}
