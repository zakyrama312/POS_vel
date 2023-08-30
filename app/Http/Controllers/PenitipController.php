<?php

namespace App\Http\Controllers;

use App\Models\Penitip;
use App\Http\Requests\StorePenitipRequest;
use App\Http\Requests\UpdatePenitipRequest;

class PenitipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penitip = Penitip::all();
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
    public function store(StorePenitipRequest $request)
    {
        $request -> validate();
        Penitip::create([
            'namapenitip' => $request -> nama_penitip,
            'nomer' => $request -> no_telp,
            'created_at' => now(),
        ]);

        return redirect('penitip')->with('msg', 'Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Penitip $penitip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penitip $penitip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenitipRequest $request, Penitip $penitip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penitip $penitip)
    {
        //
    }
}
