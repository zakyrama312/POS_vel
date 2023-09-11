<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = Stocks::all();
        return view('petugas.dashboard.stok', compact('stok'));
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
        Stocks::where('id_cabang', $id)
            ->update([
                'stok_awal' => 0,
                'stok_akhir' => 0,
            ]);

        return redirect('stok');
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
        $data = Stocks::find($id);
        $stokmasuk = $request->inputstok;
        $datastok = $data->stok_awal;
        $hasil = $stokmasuk + $datastok;
        $sisa = $data->stok_akhir + $stokmasuk;
        $data->stok_awal   = $hasil;
        $data->stok_akhir = $sisa;
        $data->save();


        return redirect('stok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
