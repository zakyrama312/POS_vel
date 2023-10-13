<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $siswa = Siswa::all();
        return view('admin.pplg.index', compact('siswa'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.pplg.add', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        $request->validated();
        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->namasiswa,
            'id_kelas' => $request->kelas,
            'created_at' => now(),
        ]);

        return redirect('pplg')->with('msg', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::find($id);

        return view('admin.pplg.edit', compact('siswa', 'kelas')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();

        return view('admin.pplg.edit', compact('siswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa, $id)
    {
        
        
        // $data->nis = $request->nis;
        // $data->nama_siswa = $request->namasiswa;
        // $data->id_kelas = $request->kelas;
        // $data->updated_at = now();
        // $data->save();
        Siswa::where('id', $id)
        ->update([
            'nama_siswa' => $request->namasiswa,
            'id_kelas' => $request->kelas,
            'updated_at' => now(),
        ]);

        return redirect('pplg')->with('msg', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
