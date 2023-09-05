<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $kategori = categories::all();
      return view('admin.kategori.index', compact('kategori'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoriesRequest $request)
    {
        $request->validated();
        categories::create([
            'nama_kategori' => $request->namakategori,
            'created_at' => now(),
        ]);
        // $data = new sellers;
        // $data -> nama_penitip = $request->namapenitip;
        // $data -> no_telp = $request->nomer;
        // $data -> created_at = now();
        // $data -> save();

        return redirect('categories')->with('msg', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories, $id)
    {
        $kategori = categories::find($id);

        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoriesRequest $request, categories $categories, $id)
    {
        $data = $categories::find($id);

        $data-> nama_kategori = $request->namakategori;
        $data-> updated_at = now();
        $data->save();

        return redirect('categories')->with('msg', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        //
    }
}
