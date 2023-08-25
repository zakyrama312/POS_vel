<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Cabang;
use App\Models\categories;
use App\Models\Penitip;

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
        $nitip = Penitip::all();
        $stand = Cabang::all();
        return view('admin.products.addproduct', compact(['kat', 'nitip', 'stand']));
        
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
            'stok_akhir' => '',
            'disc' => '',
            'hpp' => $request->hpp,
            'harga_jual' => $request->harga,
            'id_kategori' => $request->kategori,
            'id_penitip' => $request->penitip,
            'id_cabang' => $request->stand,
            'created_at' => now()

        ]);

        // return view('/barang')->with('msg', 'Berhasil Ditambahkan');
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
        $nitip = Penitip::find($id);
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
        $nitip = Penitip::all();
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


        $data->nama_barang = $request->namabarang;
        $data->stok_awal   = $request->stokawal;
        $data->hpp = $request->hpp;
        $data->harga_jual = $request->harga;
        $data->id_penitip = $request->penitip;
        $data->id_kategori = $request->kategori;
        $data->id_cabang = $request->stand;
        $data->updated_at = now();
        $data->save();


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
