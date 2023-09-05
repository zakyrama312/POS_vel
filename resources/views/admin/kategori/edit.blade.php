    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Tambah</strong> Data Kategori</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Yang teliti yah :D</h5> --}}
                    </div>
                    <div class="card-body">
                         <form action="{{ url('categories/'. $id = $kategori -> id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                <input type="text" name="namakategori" class="form-control  @error('namakategori') is-invalid @enderror"  value="{{ $kategori->nama_kategori }}" id="">
                                @error('namakategori')
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

				