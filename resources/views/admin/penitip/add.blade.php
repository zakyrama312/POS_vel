    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Tambah</strong> Data Penitip</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Yang teliti yah :D</h5> --}}
                    </div>
                    <div class="card-body">
                         <form action="{{ url('sellers') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Nama Penitip</label>
                                <div class="col-sm-10">
                                <input type="text" name="namapenitip" autofocus class="form-control  @error('namapenitip') is-invalid @enderror"  value="{{ old('namapenitip') }}" id="">
                                @error('namapenitip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">No. Telp</label>
                                <div class="col-sm-10">
                                <input type="number" name="nomer" class="form-control @error('nomer') is-invalid @enderror" value="{{ old('nomer') }}"  id="">
                                @error('nomer')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" name="simpan" class="btn mt-2 btn-outline-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        {{-- end content --}}

				