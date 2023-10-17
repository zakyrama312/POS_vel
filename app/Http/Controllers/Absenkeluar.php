<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class Absenkeluar extends Controller
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
    public function store(Request $request)
    {
        $nis = $request->nis;
        $date = date("d-m-Y");
        $absensi = Absen::where('nis', $nis)
            ->where('tanggal', $date)
            ->update([
                'jam_keluar' => date("h:i"),
            ]);
        if ($absensi) {
            return redirect('absenkeluar')->with('msg', 'Berhasil Ditambahkan');
        }else{
            return redirect('absenkeluar')->with('psn', 'Data Sudah Ada');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
