<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use Clockwork\Request\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAbsenRequest;
use App\Http\Requests\UpdateAbsenRequest;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = DB::table('absens')
            ->join('siswas', 'absens.nis', '=', 'siswas.nis')
            ->join('kelas', 'siswas.id_kelas', '=', 'kelas.id')
            ->select('siswas.*', 'kelas.*', 'absens.*')
            ->get();
        return view('admin.absen.index', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsenRequest $request)
    {
      
        $nisn = $request->nis;
        $siswa = Siswa::all()
            ->where('nis', $nisn);
        $nis_siswa = $siswa->implode('nis');

        $tanggal = date("d-m-Y");
        $absenss = Absen::select('*')
        ->where('tanggal', $tanggal)
        ->get();
        $cek = $absenss->count();
        if ($cek == 0) {
            if ($nisn == $nis_siswa) {
                Absen::create([
                    'nis' => $request->nis,
                    'jam_masuk' => date("h:i:s"),
                    'tanggal' => date("d-m-Y")
                ]);
                return redirect('absenmasuk')->with('msg', 'Berhasil Ditambahkan');
            } 
        } else if ($nisn != $nis_siswa) {
            return redirect('absenmasuk')->with('psn', 'Data Sudah Ada');
        }
        else{
            return redirect('absenmasuk')->with('sudah', 'Berhasil Ditambahkan');
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
    public function absenkeluar(Request $request){
        return view('petugas.dashboard.absenpiket.absenkeluar');
    }
}
