<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pos Vel</title>
  </head>
  <body>
    <div class="row container-fluid  mt-3">
        <h1 class="h3 mb-3"><strong>Data Penjualan</strong> {{ $tanggalan }}</h1>
        <table  class="table table-striped table-hover table-bordered" style="border: 1px solid black;">
            <thead>
                <tr>
                    <th style="width: 20px">No</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center" >Harga Satuan</th>
                    <th class="text-center" style="width: 100px">Stok Awal</th>
                    <th class="text-center">Sisa</th>
                    <th class="text-center" >Jumlah Terjual</th>
                    <th class="text-center" style="width: 120px">Total</th>
                    <th class="text-center" style="width: 120px">Penitip</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($order as $prd)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $prd -> nama_barang }}</td>
                        <td class="text-center">Rp. {{ number_format($prd -> harga_jual, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $prd -> stok_awal }} pcs</td>
                        <td class="text-center">{{ $prd -> stok_akhir }} pcs</td>
                        <td class="text-center">{{ $prd -> jumlah }} pcs</td>
                        <td>Rp. {{ number_format($prd -> total, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $prd -> nama_penitip }}</td>
                    </tr> 
                    @endforeach
                    <tr>
                        <th colspan="6">Total Seluruh</th>
                        <th>Rp. {{ number_format($total, 0, ',', '.'); }}</th>
                        <th></th>
                    </tr>
            </tbody>
        </table>






    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>









  
