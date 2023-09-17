<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStocksRequest;
use App\Http\Requests\UpdateStocksRequest;

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
        $idbarang = $data->id_barang;
        $idcabang = Auth::user()->id_cabang;
        $stokmasuk = $request->inputstok;
        $datastok = $data->stok_awal;
        $hasil = $stokmasuk + $datastok;
        $sisa = $data->stok_akhir + $stokmasuk;

        Products::where('id', $id)
        ->update([
            'stok_awal' => $hasil,
            'stok_akhir' => $sisa,
        ]);
        $date = date('Y-m-d');
        $stoks = Stocks::select('*')
            ->where('id_barang', $idbarang)
            ->where('periode', $date)
            ->get();
        $cek = $stoks->count();
        if ($cek == 0) {
            Stocks::create([
                'id_barang' => $idbarang,
                'id_cabang' => $idcabang,
                'stok_awal' => $hasil,
                'stok_akhir' => $sisa,
                'periode' => $date
            ]);
            return redirect('stocks');
        } else {
            Stocks::where('id_barang', $idbarang)
                ->where('periode', $date)
                ->update([
                    'stok_awal' => $hasil,
                    'stok_akhir' => $sisa,
                ]);
            return redirect('stocks');
        }
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
