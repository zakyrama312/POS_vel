    @extends('petugas.layout.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Data</strong> Stok Barang</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                     
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('pos') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('stok/'. $id = Auth::user()->id_cabang  ) }}" style="margin-right: 80px" class="btn btn-danger position-absolute top-10 end-0 " title="Print"> Reset Stok </a>
                                <a href="{{ url('printstock') }}" class="btn btn-success position-absolute top-10 end-0 me-4" title="Print"> <i class="align-middle" data-feather="printer"></i> </a>
                            </div>
                        </div>
                         @if (session('msg'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ session('msg') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                    </div>
                    <div class="card-body">
                        <table  id="databarang" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Penitip</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok Masuk</th>
                            <th scope="col">Stok Akhir</th>
                            <th scope="col" style="width: 13%">Restock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stok as $prd)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $prd -> nama_barang }}</td>
                                <td>{{ $prd -> penitips -> nama_penitip }}</td>
                                <td>Rp. {{ number_format($prd -> harga_jual, 0, ',', '.') }}</td>
                                <td>{{ $prd -> stok_awal }} pcs</td>
                                <td>{{ $prd -> stok_akhir }} pcs</td>
                                <td class="text-center">
                                    <form action="{{ url('stok/'.$prd -> id ) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" class="form-control text-center" placeholder="..." name="inputstok">
                                    </form>
                                    {{-- <a href="{{ url('products/'. $prd -> id .'/edit/') }}" class="text-warning"><i class="align-middle" data-feather="edit"></i> <span class="align-middle"></a> --}}
                                    </td>
                            </tr> 
                            @endforeach
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        {{-- end content --}}