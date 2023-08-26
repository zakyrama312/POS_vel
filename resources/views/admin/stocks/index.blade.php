    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Data</strong> Barang</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
                        <a href="{{ url('products/create') }}" class="btn btn-outline-primary">Tambah Barang</a>
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
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Stok Masuk</th>
                            <th scope="col">Stok Akhir</th>
                            <th scope="col" style="width: 13%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stok as $prd)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $prd -> id_barang }}</td>
                                <td>{{ $prd -> nama_barang }}</td>
                                <td>{{ $prd -> stok_awal }} pcs</td>
                                <td>{{ $prd -> stok_akhir }} pcs</td>
                                <td class="text-center">
                                    <form action="{{ url('stocks/'.$prd -> id ) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" class="form-control" placeholder="input stok" name="inputstok">
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