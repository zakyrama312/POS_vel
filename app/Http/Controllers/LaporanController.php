<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\sellers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
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
        $tanggalan = $dayList[$day] . ', ' . $tanggal;
        $order = DB::table('orders')
            ->where('periode', $date)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->select(DB::raw('sum(orders.jumlah) as jumlah'), DB::raw('sum(orders.total) as total'), DB::raw('sum(orders.laba) as laba'), DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.stok_awal', 'products.stok_akhir', 'products.harga_jual')
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
        return view('admin.laporan.index', compact('order', 'tanggalan', 'penitip', 'total', 'laba', 'kembali'));
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
        //
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
    public function filter(Request $request)
    {
        $idpenitip = $request->penitip;
        $start_date = $request->start;
        $end_date = $request->end;
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
        ->whereBetween('orders.periode', [$start_date, $end_date])
        ->whereBetween('stocks.periode', [$start_date, $end_date])
        // ->where('orders.id_penitip', $idpenitip)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->join('stocks', 'products.id_barang', '=', 'stocks.id_barang')
            ->select(DB::raw('sum(orders.jumlah) as jumlah'), DB::raw('sum(orders.total) as total'), DB::raw('sum(orders.laba) as laba'), DB::raw('sum(orders.uang_kembali) as uang_kembali'),DB::raw('sum(stocks.stok_awal) as stok_awal'),DB::raw('sum(stocks.stok_akhir) as stok_akhir'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.harga_jual')
            ->orderBy('orders.invoice')
            ->groupBy('orders.id_barang')
            ->get();
        $total = Order::all()
            ->whereBetween('periode', [$start_date, $end_date])
            // ->where('id_penitip', $idpenitip)
            ->sum('total');
        $laba = Order::all()
            ->whereBetween('periode', [$start_date, $end_date])
            // ->where('id_penitip', $idpenitip)
            ->sum('laba');
        $kembali = Order::all()
            ->whereBetween('periode', [$start_date, $end_date])
            // ->where('id_penitip', $idpenitip)
            ->sum('uang_kembali');
        $penitip = sellers::all();
        return view('admin.laporan.index', compact('order', 'tanggalan', 'penitip', 'total', 'laba', 'kembali', 'start_date', 'end_date'));
    }

    public function report(Request $request)
    {
        $idpenitip = $request->rpl;
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
        return view('admin.laporan.report', compact('order', 'tanggalan', 'penitip', 'total', 'laba', 'kembali'));
    }
}


