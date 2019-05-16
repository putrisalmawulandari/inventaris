<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }
</style>

<body>
    @if($param == "items")
    @if($params == "items")
    <h1>Laporan Semua Barang</h1>
    @elseif($params == "old_items")
    <h1>Laporan Semua Barang dari yang Terlama</h1>
    @elseif($params == "new_items")
    <h1>Laporan Semua Barang dari yang Terbaru</h1>
    @endif
    <p style="margin-top: -20px;">Tanggal Cetak : {{ date("Y-m-d") }}</p>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Total</td>
                <td>Type</td>
                <td>Room</td>
                <td>User</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $field)
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

</html>