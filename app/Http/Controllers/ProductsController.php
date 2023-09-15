<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Stocks;
use App\Models\Penitip;
use App\Models\sellers;
use App\Models\Products;
use App\Models\categories;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produk = Products::all();
        return view('admin.products.index', compact('produk'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kat = categories::all();
        $nitip = sellers::all();
        $stand = Cabang::all();

        $now = Carbon::now();
        $idcabang =  Auth::user()->id_cabang ;
        $thnaBulan = $now->year . $now->month;
        $cek = Products::count();
        if ($cek == 0 ) {
            $urut = 1001;
            $nomer = 'BR'. $idcabang . $urut;
        } else {
            $ambil = Products::all()->last();
            $urut = (int)substr($ambil->id_barang, -4) + 1;
            $nomer = 'BR' . $idcabang . $urut;
        }
        return view('admin.products.addproduct', compact(['kat', 'nitip', 'stand', 'nomer']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        //
         $request->validated();
        
        Products::create([
            'id_barang'     => $request->kode,
            'nama_barang'     => $request->namabarang,
            'stok_awal'   => $request->stokmasuk,
            'stok_akhir' => $request->stokmasuk,
            'disc' => '',
            'hpp' => 0,
            'harga_jual' => $request->harga,
            'id_kategori' => $request->kategori,
            'id_penitip' => $request->penitip,
            'id_cabang' => $request->stand

        ]);
        Stocks::create([
            'id_barang'    => $request->kode,
            'id_cabang' => $request->stand,
            'stok_awal'   => $request->stokmasuk,
            'stok_akhir' => $request->stokmasuk,
            'periode' => date('Y-m-d')
        ]);
        
        return redirect('products')->with('msg', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // return $products;
        $product = Products::find($id);
        $kat = categories::find($id);
        $nitip = sellers::find($id);
        $stand = Cabang::find($id);

        $product -> makeHidden('id_barang');
        return view('admin.products.editproducts', compact('product','kat','nitip','stand'));   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $product = Products::find($id);
        $kat = categories::all();
        $nitip = sellers::all();
        $stand = Cabang::all();

        return view('admin.products.editproducts', compact('product', 'kat', 'nitip', 'stand'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products, $id)
    {
        //
        $data = $products->find($id);


        // $data->nama_barang = $request->namabarang;
        // $data->stok_awal   = $request->stokawal;
        // $data->hpp = $request->hpp;
        // $data->harga_jual = $request->harga;
        // $data->id_penitip = $request->penitip;
        // $data->id_kategori = $request->kategori;
        // $data->id_cabang = $request->stand;
        // $data->updated_at = now();
        // $data->save();
        Products::where('id_barang', $id)
            ->update([
                'nama_barang' => $request->namabarang,
                'stok_awal' => $request->stokmasuk,
                'stok_akhir' => $request->stokmasuk,
                'hpp' => 0,
                'harga_jual' => $request->harga,
                'id_penitip' => $request->penitip,
                'updated_at' => now(),
            ]);
        $date = date('Y-m-d');
        Stocks::where('id_barang', $id)
            ->where('periode', $date)
            ->update([
            'stok_awal' => $request->stokmasuk,
            'stok_akhir' => $request->stokmasuk,
            'updated_at' => now(),
            ]);

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
