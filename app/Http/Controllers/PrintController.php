<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\sellers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function printrpl()
    {
        $idpenitip = 10;
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
            ->where('orders.id_penitip', $idpenitip)
            ->where('periode', $date)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->select(DB::raw('sum(orders.jumlah) as jumlah'), DB::raw('sum(orders.total) as total'), DB::raw('sum(orders.laba) as laba'), DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.stok_awal', 'products.stok_akhir', 'products.harga_jual')
            ->orderBy('orders.invoice')
            ->groupBy('orders.id_barang')
            ->get();
        $total = Order::all()
            ->where('periode', $date)
            ->where('id_penitip', $idpenitip)
            ->where('id_penitip', $idpenitip)
            ->sum('total');
        $penitip = sellers::all()
            ->where('id_penitip', $idpenitip);
        return view('petugas.dashboard.print.print', compact('order', 'tanggalan', 'penitip', 'total'));
    }
    public function label()
    {
        $idpenitip = 10;
        $date = date('Y-m-d');
        $order = DB::table('orders')
            ->whereNot('orders.id_penitip', $idpenitip)
            ->where('orders.periode', $date)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->select(DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.stok_awal', 'products.stok_akhir', 'products.harga_jual')
            ->orderBy('orders.invoice')
            ->groupBy('orders.id_penitip')
            ->get();
        return view('petugas.dashboard.print.label', compact('order'));
    }
    public function penjualan()
    {
        $idpenitip = 10;
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
            ->whereNot('orders.id_penitip', $idpenitip)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->select(DB::raw('sum(orders.jumlah) as jumlah'), DB::raw('sum(orders.total) as total'), DB::raw('sum(orders.laba) as laba'), DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.stok_awal', 'products.stok_akhir', 'products.harga_jual')
            ->orderBy('orders.invoice')
            ->groupBy('orders.id_barang')
            ->get();
        $total = Order::all()
            ->whereNotIn('id_penitip', $idpenitip)
            ->where('periode', $date)
            ->sum('total');
        $laba = Order::all()
            ->whereNotIn('id_penitip', $idpenitip)
            ->where('periode', $date)
            ->sum('laba');
        $kembali = Order::all()
            ->whereNotIn('id_penitip', $idpenitip)
            ->where('periode', $date)
            ->sum('uang_kembali');
        $penitip = sellers::all();
        $penjualan = DB::table('orders')
            ->where('orders.periode', $date)
            ->whereNot('orders.id_penitip', $idpenitip)
            ->join('products', 'orders.id_barang', '=', 'products.id')
            ->join('penitips', 'orders.id_penitip', '=', 'penitips.id')
            ->select(DB::raw('sum(orders.uang_kembali) as uang_kembali'), 'orders.id_penitip', 'penitips.nama_penitip', 'products.nama_barang', 'products.stok_awal', 'products.stok_akhir', 'products.harga_jual')
            ->orderBy('orders.invoice')
            ->groupBy('orders.id_penitip')
            ->get();
        return view('petugas.dashboard.print.detail', compact('order', 'tanggalan', 'penitip', 'total', 'laba', 'kembali', 'penjualan'));
    }
}
