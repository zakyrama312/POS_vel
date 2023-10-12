    @extends('petugas.layout.main')
        {{-- content --}}
        @section('content')
        <a href="{{ url('pos') }}" class="btn btn-outline-secondary mb-3"><i class="align-middle" data-feather="arrow-left"></i></a> 
        <h1 class="h3 mb-3"><strong>Data Penjualan</strong> {{ $tanggalan }}</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 float-rigt d-flex">
                                <a href="detail" class="btn btn-success ">Semua</a>
                                    <form action="{{ url('/rpl') }}" method="get" class="ms-3">
                                        @csrf
                                        <input type="hidden" value="10" name="rpl">
                                        <button type="submit" class="btn text-white" style="background: rgb(166, 1, 166)">RPL</button>
                                    </form>
                            </div>
                            <div class="col-md-6">
                                 <a href="{{ url('print') }}" class="btn btn-success position-absolute top-10 end-0 me-4" title="Print Label"> <i class="align-middle" data-feather="printer"></i> </a>
                            </div>
                        </div>
                         @if (session('msg'))
                            <div class="alert alert-dismissible myalert fade show mt-2"  role="alert">
                                {{ session('msg') }} 
                                <button type="button" class="btn-close btn-default ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    
                        @endif
                        
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row d-flex">
                            {{-- <div class="col-md-4">
                                <form action={{ url('/filter') }} method="get">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <select name="penitip" class="form-control" required aria-describedby="button-addon2">
                                            <option value="" class="text-center">-- Pilih Penitip --</option>
                                            @foreach ($penitip as $ntp)
                                                <option value="{{ $ntp -> id }}">{{ $ntp -> nama_penitip }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="align-middle" data-feather="search"></i></button>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                        <table  class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">No</th>
                                <th class="text-center">Produk</th>
                                <th class="text-center" >Harga Satuan</th>
                                <th class="text-center" style="width: 100px">Stok Awal</th>
                                <th class="text-center">Sisa</th>
                                <th class="text-center" >Jumlah Terjual</th>
                                <th class="text-center" style="width: 120px">Total</th>
                                <th class="text-center" style="width: 120px">Penitip</th>
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
                                    <td class="text-center">{{ $prd -> nama_penitip }}</td>
                                </tr> 
                                @endforeach
                                <tr>
                                    <th colspan="6">Total Seluruh</th>
                                    <th>Rp. {{ number_format($total, 0, ',', '.'); }}</th>
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