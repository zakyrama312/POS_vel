    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Tambah</strong> Data Siswa</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Yang teliti yah :D</h5> --}}
                    </div>
                    <div class="card-body">
                         <form action="{{ url('pplg') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">NIS</label>
                                <div class="col-sm-10">
                                <input type="number" min="0" name="nis" class="form-control  @error('nis') is-invalid @enderror"  value="{{ old('nis') }}" id="">
                                @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Nama Siswa</label>
                                <div class="col-sm-10">
                                <input type="text" name="namasiswa" class="form-control  @error('namasiswa') is-invalid @enderror"  value="{{ old('namasiswa') }}" id="">
                                @error('namasiswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                <select name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="">
                                        <option value="">--Pilih Kelas--</option>
                                    @foreach ($kelas as $ktg)
                                        <option value="{{ $ktg -> id }}" {{ old('kelas') == $ktg -> id ? 'selected' : '' }}>{{ $ktg -> nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
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

				