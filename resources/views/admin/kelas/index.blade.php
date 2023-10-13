    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Data</strong> Kelas</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('kelas/create') }}" class="btn btn-primary">Tambah Kelas</a>
                            </div>
                        </div>
                         @if (session('msg'))
                            <div class="alert alert-dismissible myalert fade show mt-2"  role="alert">
                                {{ session('msg') }} 
                                <button type="button" class="btn-close btn-default ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    
                        @endif
                        
                    </div>
                    <div class="card-body">
                        <table  id="databarang" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col" class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $prd)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $prd -> nama_kelas }}</td>
                                <td class="text-center">
                                    <a href="{{ url('kelas/'. $prd -> id .'/edit/') }}" class="text-warning"><i class="align-middle" data-feather="edit"></i> <span class="align-middle"></a>
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