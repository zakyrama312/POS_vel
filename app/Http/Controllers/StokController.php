<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stok = Products::all();
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
        Products::where('id_cabang', $id)
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
        $data = Products::find($id);
        $idbarang = $data->id_barang;
        $idcabang = Auth::user()->id_cabang;
        $stokmasuk = $request->inputstok;
        $datastok = $data->stok_awal;
        $hasil = $stokmasuk + $datastok;
        $sisa = $data->stok_akhir + $stokmasuk;
        $data->stok_awal   = $hasil;
        $data->stok_akhir = $sisa;
        $view = Stocks::all()->where('id_barang', $idbarang);
        $periode = $view -> periode;
        Products::where('id', $id)
        ->update([
            'stok_awal' => $hasil,
            'stok_akhir' => $sisa,
        ]);
        $date = date('Y-m-d');
        if ($periode == $date) {
            Stocks::where('id_barang', $idbarang)
                ->where('periode', $date)
                ->update([
                    'stok_awal' => $hasil,
                    'stok_akhir' => $sisa,
                ]);
        }else{
            Stocks::create([
                'id_barang' => $idbarang,
                'id_cabang' => $idcabang,
                'stok_awal' => $hasil,
                'stok_akhir' => $sisa,
                'periode' => $date
            ]);
        }
 

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
