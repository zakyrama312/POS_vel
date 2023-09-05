<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chart = Products::all();
        $carts = Cart::all();
        $total = $carts->sum('harga_total');
        return view('petugas.dashboard.index', compact('chart','carts','total'));
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
    public function show(Cart $cart, $id)
    {
        $tampil = Products::find($id);
        $harga = $tampil->harga_jual;
        $keranjangstok = Cart::select('*')
            ->where('id_barang', $id)
            ->get();
        $cek = $keranjangstok->count();
        if ($cek == 0) {
            Cart::create([
                'id_barang' => $id,
                'stok' => 1,
                'harga_total' => $harga,
            ]);

            $stokbarang = $tampil->stok_akhir;
            Products::where('id', $id)
            ->update([
                'stok_akhir' => $stokbarang-1,
            ]);
            return redirect('pos');
        } else {
            $stock = $keranjangstok[0]->stok;
            Cart::where('id_barang', $id)
                ->update([
                'stok' => $stock + 1,
            ]);
            $updatecart = Cart::select('*')
                        ->where('id_barang', $id)
                        ->get();
            $stokupdate = $updatecart[0] -> stok;
            $total = $stokupdate * $harga;
            $barangUpdate = Products::find($id);
            $updateStok = $barangUpdate -> stok_akhir;
            Products::where('id', $id)
            ->update([
                'stok_akhir' => $updateStok - 1,
            ]);
            Cart::where('id_barang', $id)
            ->update([
                'harga_total' => $total,
            ]);
            return redirect('pos');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart, $id)
    {
        
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart, $id)
    {
        $updatecart = Cart::select('*')
            ->where('id_barang', $id)
            ->get();
        $stokupdate = $updatecart[0]->stok;
        $barangUpdate = Products::find($id);
        $stokbarang = $barangUpdate -> stok_akhir;
        $jmlstok = $stokupdate + $stokbarang;
        Products::where('id', $id)
            ->update([
                'stok_akhir' => $jmlstok
            ]);
        $cart::where('id_barang',$id)
        ->delete();
        return redirect('pos');
    }
}
