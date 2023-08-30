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
    <h3>Data Barang</h3>
    <table  id="databarang" class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">HPP/Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Penitip</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($print as $prd)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $prd -> id_barang }}</td>
                <td>{{ $prd -> nama_barang }}</td>
                <td>{{ $prd -> hpp }}</td>
                <td>{{ $prd -> harga_jual }}</td>
                <td>{{ $prd -> penitips -> nama_penitip }}</td>
            </tr> 
            @endforeach
            
        </tbody>
    </table>
</table>
<script src="{{ asset('/')}}assets/js/app.js"></script>
<script>
    window.print();
</script>
</body>
</html>