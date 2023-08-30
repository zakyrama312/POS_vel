<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/')}}assets/css/app.css" rel="stylesheet">
</head>
<body>
    <h3>Data Stok Barang</h3>
    <table  id="databarang" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Barang</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Stok Masuk</th>
        <th scope="col">Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($print as $prd)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $prd -> id_barang }}</td>
            <td>{{ $prd -> nama_barang }}</td>
            <td>{{ $prd -> stok_awal }} pcs</td>
            <td>{{ $prd -> stok_akhir }} pcs</td>
        </tr> 
        @endforeach
        
    </tbody>
</table>
<script src="{{ asset('/')}}assets/js/app.js"></script>
<script>
    window.print();
</script>
</body>
</html>