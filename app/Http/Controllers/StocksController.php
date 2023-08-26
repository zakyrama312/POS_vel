<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use App\Http\Requests\StoreStocksRequest;
use App\Http\Requests\UpdateStocksRequest;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = Stocks::all();
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

        $data = $stocks->find($id);
        $stokmasuk = $request->inputstok;
        $datastok = $data->stok_awal;
        $hasil = $stokmasuk + $datastok;
        $data->stok_awal   = $hasil;
        $data->save();


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
