    @extends('petugas.layout.main')
        {{-- content --}}
        @section('content')
        <h1 class="h3 mb-3"><strong>Point of Sales</strong> Vel</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card table-responsive">
                    <div class="card-header">
                        <a href="stok" class="btn btn-outline-primary">Tambah Stok</a>
                        <a href="detail" class="btn btn-outline-info ms-2">Detail Penjualan</a>
                    </div>
                    <div class="card-body">
                        <table  id="databarang" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                            {{-- <th scope="col" style="width: 100px">Kode</th> --}}
                            <th scope="col">Produk</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chart as $prd)
                            <tr>
                                {{-- <td>{{ $prd -> id_barang }}</td> --}}
                                <td>{{ $prd -> nama_barang }}</td>
                                <td class="{{ $prd -> stok_akhir == 0 ? 'text-danger' : '' }}">{{ $prd -> stok_akhir == 0 ? 'Habis' : $prd -> stok_akhir .' pcs' }}</td>
                                <td>{{ $prd -> formatRupiah('harga_jual') }}</td>
                                <form action="{{ url('pos/'. $id = $prd -> id ) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                <td>
                                    <input type="number" name="jml" min="0" title="Isi Jumlah Sesuai yang akan di Transaksi" style="width: 80px" required oninvalid="this.setCustomValidity('Diisi dulu Bang')">
                                    @error('jml')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="text-success border-0 bg-white"><i class="align-middle" data-feather="plus-square"></i> <span class="align-middle"></button>                           
                                </tr> 
                                </form>
                            @endforeach
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card table-responsive">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 col-sm-6">
                                <h5 class="card-title mb-0">Keranjang</h5>
                                @if (session('msg'))
                                    <script>
                                        Swal.fire(
                                            'Transaksi Berhasil',
                                            '',
                                            'success'
                                            )
                                    </script>
                                @endif
                                @if (session('pesan'))
                                    <script>
                                       Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Stok Tidak Cukup',
                                            })
                                    </script>
                                @endif
                            </div>
                            <div class="col-md-4 text-right col-sm-6">
                                <h5 class="card-title mb-0">INVOICE {{ $nomer }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table  id="databarang" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Produk</th>
                                <th class="text-center" style="width: 50px">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total</th>
                                <th class="text-center" class="text-center"></th>
                            </tr>                           
                        </thead>
                        <tbody>
                            @foreach ($carts as $prd)
                            <tr>
                                <td>{{ $prd -> prdk -> nama_barang }}</td>
                                <td class="text-center">{{ $prd -> stok }}</td>
                                <td class="text-center">{{ $prd -> prdk -> formatRupiah('harga_jual') }}</td>
                                <td class="text-center">{{ $prd -> formatRupiah('harga_total') }}</td>
                                <td class="text-center">
                                    <form action="{{ url('pos/'. $id = $prd -> id_barang) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger border-0 bg-white"><i class="align-middle" data-feather="minus-square"></i> <span class="align-middle"></a>
                                    </form>
                            </tr> 
                            @endforeach
                            <tr>
                                <th colspan="3">Total</th>
                                <th colspan="2" class="text-center">Rp. {{ number_format($total, 0, ',', '.') }}</th>
                            </tr>
                        </tbody>
                        </table>
                        {{-- form transaksi --}}
                        <form action="{{ url('pos') }}" method="post">
                            @csrf
                            @foreach ($carts as $prk)
                                <input type="hidden" name="invoice[]" value="{{ $nomer }}">
                                <input type="hidden" name="idbarang[]" value="{{ $prk -> id_barang }}">
                                <input type="hidden" name="idpenitip[]" value="{{ $prk -> prdk -> id_penitip }}">
                                <input type="hidden" name="idcabang[]" value="{{ $prk -> prdk -> id_cabang }}">
                                <input type="hidden" name="jumlah[]" value="{{ $prk -> stok }}">
                                <input type="hidden" name="harga[]" value="{{ $prk -> prdk -> harga_jual }}">
                                <input type="hidden" name="hargatotal[]" value="{{ $prk -> harga_total }}">
                                <input type="hidden" name="periode[]" value="{{ date('Y-m-d') }}">
                            @endforeach
                            <input type="hidden" name="invoicetrans" value="{{ $nomer }}">
                            <input type="hidden" onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);" value="{{ $total }}" readonly class="form-control" name="bigtotal" id="type1">
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label for="" class="col-sm-6 col-form-label" >Bayar</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control input-lg" autofocus id="type2" name="bayar" required oninvalid="this.setCustomValidity('Bayarnya Belum :D')" onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-6">
                                <label for="" class="col-sm-6 col-form-label">Kembalian</label>
                            </div>
                            <div class="col-sm-6">
                            <input type="hidden" name="kembalian" id="kembalian">
                            <input type="text" id="result" class="form-control" style="border: none; color: white; background-color: orangered;">
                            </div>
                            <button type="submit" name="bayaran" class="form-control btn btn-outline-success mt-2">Transaksi</button>
                            </form>
                        {{-- end form --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        {{-- end content --}}


        <script>

            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            function convertToRupiah(angka) {
                var rupiah = '';
                var angkarev = angka.toString().split('').reverse().join('');
                for (var i = 0; i < angkarev.length; i++)
                    if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
            }

            function kalkulatorTambah(type1, type2) {

                var a = parseInt(type1.replace(/,.*|[^0-9]/g, ''), 10); //eval(type1);
                var b = parseInt(type2.replace(/,.*|[^0-9]/g, ''), 10);
                var hasil = b - a;

                var jumlah = 'Rp. ' + hasil.toFixed(0).replace(/(d)(?=(ddd)+(?!d))/g, "$1.");
                //var total = NilaiRupiah(hasil);
                // console.info('hahah')
                document.getElementById('result').value = convertToRupiah(hasil);

                document.getElementById("kembalian").value = hasil; //document.getElementById("type2").value;

            }

            /* Tanpa Rupiah */
            var tanpa_rupiah = document.getElementById('type1');
            tanpa_rupiah.addEventListener('keyup', function(e) {
                tanpa_rupiah.value = formatRupiah(this.value);
            });

        </script>
        


        

				