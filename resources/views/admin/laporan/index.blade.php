    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        @if ($tanggalan)
            <h1 class="h3 mb-3"><strong>Data Penjualan</strong> {{ $tanggalan }}</h1>
        @elseif ($start_date && $end_date)
            <h1 class="h3 mb-3"><strong>Data Penjualan Dari</strong> {{ $tanggalan }}</h1>
        @endif

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        @if (session('msg'))
                            <div class="alert alert-dismissible myalert fade show mt-2"  role="alert">
                                {{ session('msg') }} 
                                <button type="button" class="btn-close btn-default ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row d-flex">
                            <div class="col-md-12">
                                <form action={{ url('/filterlaporan') }} method="get">
                                    @csrf
                                    <p><b>Filter</b> berdasarkan Tanggal</p>
                                    <div class="input-group mb-3 ">
                                        <input type="date" class="form-control me-2" name="start">
                                        <input type="date" class="form-control me-2" name="end">
                                        {{-- <select name="penitip" class="form-control" aria-describedby="button-addon2">
                                            <option value="" class="text-center">-- Pilih Penitip --</option>
                                            @foreach ($penitip as $ntp)
                                                <option value="{{ $ntp -> id }}">{{ $ntp -> nama_penitip }}</option>
                                            @endforeach
                                        </select> --}}
                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="align-middle" data-feather="search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8 float-right d-flex">
                                <a href="laporan" class="btn btn-success mb-3">Semua</a>
                                <form action="{{ url('/report') }}" method="get" class="ms-3">
                                    @csrf
                                    <input type="hidden" value="10" name="rpl">
                                    <button type="submit" class="btn text-white" style="background: rgb(166, 1, 166)">RPL</button>
                                </form>
                            </div>
                             <div class="col-md-2 justify-start">
                                
                                
                            </div>
                        </div>
                        @if (session('msg'))       
                        <div class="row">
                            <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                    Dari Tanggal {{ $start_date }} Sampai Tanggal {{ $end_date }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <table  class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">No</th>
                                <th class="text-center">Produk</th>
                                <th class="text-center" >Harga Satuan</th>
                                <th class="text-center" style="width: 100px">Stok Awal</th>
                                <th class="text-center">Sisa</th>
                                <th class="text-center" >Jumlah Terjual</th>
                                <th class="text-center" >Total</th>
                                <th class="text-center" >Laba</th>
                                <th class="text-center" >Uang Kembali</th>
                                <th class="text-center" >Penitip</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($order as $prd)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $prd -> nama_barang }}</td>
                                    <td class="text-center">Rp. {{ number_format($prd -> harga_jual, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $prd -> stok_awal }} pcs</td>
                                    <td class="text-center">{{ $prd -> stok_akhir }} pcs</td>
                                    <td class="text-center">{{ $prd -> jumlah }} pcs</td>
                                    <td>Rp. {{ number_format($prd -> total, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($prd -> laba, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($prd -> uang_kembali, 0, ',', '.'); }}</td>
                                    <td class="text-center">{{ $prd -> nama_penitip }}</td>
                                </tr> 
                                @endforeach
                                <tr>
                                    <th colspan="6">Total Seluruh</th>
                                    <th>Rp. {{ number_format($total, 0, ',', '.'); }}</th>
                                    <th>Rp. {{ number_format($laba, 0, ',', '.'); }}</th>
                                    <th>Rp. {{ number_format($kembali, 0, ',', '.'); }}</th>
                                    <th></th>
                                </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        {{-- end content --}}