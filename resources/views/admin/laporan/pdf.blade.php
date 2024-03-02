<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/icon_admin.png') }}" />

    <title>admin</title>
    <style>
        /* Gaya untuk elemen body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        /* Gaya untuk judul */
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Gaya untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk header tabel */
        th {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        /* Gaya untuk baris tabel */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Gaya untuk sel tabel */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        #total {
            text-align: center;
            font: bold;
        }

        #jumlah {
            font: bold;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan Transaksi</h1>
    <table>
        <thead>
            <tr>
                <th>No Transaksi</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->no }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>Rp{{ number_format($transaction->total_bayar, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td id="total" colspan="2">
                    <h3>Total Pendapatan</h3>
                </td>
                <td id="jumlah">
                    <h3>Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                </td>
            </tr>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
