<?php

namespace App\Http\Controllers;

use App\Models\sellers;
use App\Http\Requests\StoresellersRequest;
use App\Http\Requests\UpdatesellersRequest;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penitip = sellers::all();
        return view('admin.penitip.index', compact('penitip'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penitip.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresellersRequest $request)
    {
        $request->validated();
        sellers::create([
            'nama_penitip' => $request->namapenitip,
            'no_telp' => $request->nomer,
            'created_at' => now(),
        ]);
        // $data = new sellers;
        // $data -> nama_penitip = $request->namapenitip;
        // $data -> no_telp = $request->nomer;
        // $data -> created_at = now();
        // $data -> save();

        return redirect('sellers')->with('msg', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(sellers $sellers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sellers $sellers, $id)
    {
        $seller = sellers::find($id);

        return view('admin.penitip.edit', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesellersRequest $request, sellers $sellers, $id)
    {
        $data = $sellers::find($id);

        $data-> nama_penitip = $request->namapenitip;
        $data->no_telp = $request->nomer;
        $data->updated_at = now();
        $data->save();

        return redirect('sellers')->with('msg', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sellers $sellers)
    {
        //
    }
}
