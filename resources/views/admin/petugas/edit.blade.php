    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Tambah</strong> Data Petugas</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        {{-- <h5 class="card-title mb-0">Yang teliti yah :D</h5> --}}
                    </div>
                    <div class="card-body">
                         <form action="{{ url('user/'. $id = $user -> id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Nama Petugas</label>
                                <div class="col-sm-10">
                                <input type="text" name="namapetugas" class="form-control  @error('namapetugas') is-invalid @enderror"  value="{{ $user -> name }}" id="">
                                @error('namapetugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror"  value="{{ $user -> username }}" id="">
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"  value="{{ old('password') }}" id="">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                <select name="role" class="form-control @error('role') is-invalid @enderror" id="">
                                        <option value="">--Pilih Role--</option>
                                        <option value="admin" {{ $user -> role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="Petugas" {{ $user -> role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                </select>
                                @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                <select name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="">
                                        <option value="">--Pilih Kelas--</option>
                                        <option value="X PPLG 1" {{ $user -> kelas == 'X PPLG 1' ? 'selected' : '' }}>X PPLG 1</option>
                                        <option value="X PPLG 2" {{ $user -> kelas == 'X PPLG 2' ? 'selected' : '' }}>X PPLG 2</option>
                                        <option value="XI PPLG 1" {{ $user -> kelas == 'XI PPLG 1' ? 'selected' : '' }}>XI PPLG 1</option>
                                        <option value="XI PPLG 2" {{ $user -> kelas == 'XI PPLG 2' ? 'selected' : '' }}>XI PPLG 2</option>
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

				