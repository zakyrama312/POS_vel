    @extends('admin.layouts.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Tambah</strong> Data Barang</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Yang teliti yah :D</h5>
                    </div>
                    <div class="card-body">
                         <form action="{{ url('products/'.$id = $product -> id_barang) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-10">
                                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" readonly id="" value="{{  $product -> id_barang }}">
                                @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                <input type="text" name="namabarang" class="form-control  @error('namabarang') is-invalid @enderror"  value="{{ $product -> nama_barang }}" id="">
                                @error('namabarang')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Stok Masuk</label>
                                <div class="col-sm-10">
                                <input type="text" name="stokmasuk" class="form-control @error('stokmasuk') is-invalid @enderror" value="{{ $product -> stok_awal }}"  id="">
                                @error('stokmasuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            {{-- <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">HPP/Harga Beli</label>
                                <div class="col-sm-10">
                                <input type="text" name="hpp" class="form-control @error('hpp') is-invalid @enderror" value="{{ $product -> hpp }}"  id="">
                                @error('hpp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div> --}}
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Harga Jual</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{ $product -> harga_jual }}" name="harga" id="">
                                @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="">
                                        <option value="">--Pilih Kategori--</option>
                                    @foreach ($kat as $ktg)
                                        <option value="{{ $ktg -> id }}"  {{  $product->id_kategori == $ktg -> id ? 'selected' : '' }} >{{ $ktg -> nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label">Penitip</label>
                                <div class="col-sm-10">
                                <select name="penitip" class="form-control @error('penitip') is-invalid @enderror" id="">
                                        <option value="">--Pilih Penitip--</option>
                                    @foreach ($nitip as $ntp)
                                        <option value="{{ $ntp -> id }}"  {{  $product->id_penitip == $ntp -> id ? 'selected' : '' }}>{{ $ntp -> nama_penitip }}</option>
                                    @endforeach
                                </select>
                                @error('penitip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" name="simpan" class="btn mt-2 btn-outline-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        {{-- end content --}}

				