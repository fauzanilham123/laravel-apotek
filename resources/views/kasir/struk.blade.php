<html>

<head>
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin: 10px 0;
        }

        .total {
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Struk Transaksi</h1>
        <p>No. Transaksi: {{ $data['no_transaksi'] }}</p>
        <p>Tanggal: {{ $data['date'] }}</p>
        <p>Nama Dokter: {{ $data['nama_dokter'] }}</p>
        <p>Obat: {{ $data['obat']['nama_obat'] }}</p>
        <p>Nama Pasien: {{ $data['nama_pasien'] }}</p>
        <p>Jumlah Obat: {{ $data['jumlah_obat'] }}</p>
        <p>Total Bayar: Rp {{ number_format($data['total_bayar'], 0, ',', '.') }}</p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
