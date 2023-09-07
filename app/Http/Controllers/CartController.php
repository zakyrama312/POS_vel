<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Products;
use App\Models\Transaksi;
use Carbon\Carbon;
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

        $now = Carbon::now();
        $thnaBulan = $now->year . $now->month;
        $cek = Transaksi::count();
        if ($cek == 0) {
           $urut = 10000001;
           $nomer =  $thnaBulan . $urut;

        }else{
            $ambil = Transaksi::all()->last();
            $urut = (int)substr($ambil->invoice, -8) + 1;
            $nomer =  $thnaBulan . $urut;
        }
        return view('petugas.dashboard.index', compact('chart','carts','total','nomer'));
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

        $data = $request->all();
        if (count($request->idbarang) > 0) {
            foreach ($data['idbarang'] as $item => $value) {
                $laba = $data['hargatotal'][$item] * 10 / 100;
                $uangtotal = $data['hargatotal'][$item];
                $uangKembali = $uangtotal - $laba;
                $data2 = array(
                    'id_barang' =>$data['idbarang'][$item],
                    'id_penitip' => $data['idpenitip'][$item],
                    'id_cabang' => $data['idcabang'][$item],
                    'invoice' => $data['invoice'][$item],
                    'jumlah' =>  $data['jumlah'][$item],
                    'total' => $data['hargatotal'][$item],
                    'periode' => $data['periode'][$item],
                    'laba' => $laba,
                    'uang_kembali' => $uangKembali,
                );
                Order::create($data2);
            }
        }
        Transaksi::create([
            'invoice'     => $request->invoicetrans,
            'diskon'     => 0,
            'potongan'   => 0,
            'bayar'   => $request->bayar,
            'kembalian'   => $request->kembalian,
            'periode' => date('Y-m-d'),
            'bulan' => date("F"),
        ]);
        Cart::truncate();
        return redirect('pos')->with('msg', 'Transaksi Berhasil');
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
