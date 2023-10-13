<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use Clockwork\Request\Request;
use App\Http\Requests\StoreAbsenRequest;
use App\Http\Requests\UpdateAbsenRequest;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAbsenRequest $request)
    {
        $request->validated();
        $nisn = $request->nis;
        $siswa = Siswa::all()
            ->where('nis', $nisn);
        $nis_siswa = $siswa->implode('nis');

        if ($nisn == $nis_siswa) {
            Absen::create([
                'nis' => $request->nis,
                'jam_masuk' => date("h:i:sa"),
            ]);
            return redirect('absenmasuk')->with('msg', 'Berhasil Ditambahkan');
        }else{
            return redirect('absenmasuk')->with('psn', 'Berhasil Ditambahkan');
        }
        

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsenRequest $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absen $absen)
    {
        //
    }

    public function absenmasuk(Request $request){
        return view('petugas.dashboard.absenpiket.absenmasuk');
    }
}
