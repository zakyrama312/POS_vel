    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Data</strong> Barang</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('products/create') }}" class="btn btn-primary">Tambah Barang</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('printbarang') }}" class="btn btn-success position-absolute top-10 end-0 me-4" title="Print"> <i class="align-middle" data-feather="printer"></i> </a>
                            </div>
                        </div>
                         @if (session('msg'))
                            <div class="alert alert-success alert-dismissible fade show mt-2 myalert" role="alert">
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
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">HPP/Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Penitip</th>
                            <th scope="col" class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $prd)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $prd -> id_barang }}</td>
                                <td>{{ $prd -> nama_barang }}</td>
                                <td>{{ $prd -> hpp }}</td>
                                <td>{{ $prd -> harga_jual }}</td>
                                <td>{{ $prd -> penitips -> nama_penitip }}</td>
                                <td class="text-center"><a href="{{ url('products/'. $prd -> id .'/edit/') }}" class="text-warning"><i class="align-middle" data-feather="edit"></i> <span class="align-middle"></a> 
                                    | <a href="" class="text-danger"><i class="align-middle" data-feather="trash"></i> <span class="align-middle"></a> </td>
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