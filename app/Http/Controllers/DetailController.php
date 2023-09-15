<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use App\Models\sellers;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use App\Traits\HasFormatRupiah;
class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = date('Y-m-d');
        $tanggal = date('j F Y');
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $tanggalan = $dayList[$day] .', ' . $tanggal;
        $order = DB::table('orders')
                ->where('periode', $date)
                ->join('products', 'orders.id_barang', '=', 'products.id')
                ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
                ->select(DB::raw('sum(orders.jumlah) as jumlah'), DB::raw('sum(orders.total) as total'), DB::raw('sum(orders.laba) as laba') , DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip','penitips.nama_penitip','products.nama_barang','products.stok_awal','products.stok_akhir','products.harga_jual')
                ->orderBy('orders.invoice')
                ->groupBy('orders.id_barang')
                ->get();
        $total = Order::all()
                ->where('periode', $date)
                ->sum('total');
        $laba = Order::all()
                ->where('periode', $date)
                ->sum('laba');
        $kembali = Order::all()
                ->where('periode', $date)
                ->sum('uang_kembali');
        $penitip = sellers::all();
        // dd($order);
        return view('petugas.dashboard.detail', compact('order','tanggalan','penitip','total','laba','kembali'));
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
        $data = Products::find($id);
        $stokmasuk = $request->inputstok;
        $datastok = $data->stok_awal;
        $hasil = $stokmasuk + $datastok;
        $data->stok_awal   = $hasil;
        $data->stok_akhir = $hasil;
        $data->save();


        return redirect('stocks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function filter(Request $request){
        $idpenitip = $request->penitip;
        $tanggal = date('j F Y');
        $date = date('Y-m-d');
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $tanggalan = $dayList[$day] . ', ' . $tanggal;
        $order = DB::table('orders')
            ->where('orders.id_penitip', $idpenitip)
            ->where('orders.periode', $date)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->select(DB::raw('sum(orders.jumlah) as jumlah'), DB::raw('sum(orders.total) as total'), DB::raw('sum(orders.laba) as laba'), DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.stok_awal', 'products.stok_akhir', 'products.harga_jual')
            ->orderBy('orders.invoice')
            ->groupBy('orders.id_barang')
            ->get();
        $total = Order::all()
        ->where('id_penitip', $idpenitip)
        ->where('periode', $date)
        ->sum('total');
        $laba = Order::all()
        ->where('id_penitip', $idpenitip)
        ->where('periode', $date)
        ->sum('laba');
        $kembali = Order::all()
        ->where('id_penitip', $idpenitip)
        ->where('periode', $date)
        ->sum('uang_kembali');
        $penitip = sellers::all();
        return view('petugas.dashboard.detail', compact('order', 'tanggalan', 'penitip', 'total', 'laba', 'kembali'));
    }
}
