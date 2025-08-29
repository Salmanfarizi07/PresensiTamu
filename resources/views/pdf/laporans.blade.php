<style>
    body { 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        font-size: 11pt; 
        color: #333;
        margin: 0;
        padding: 0;
    }

    header {
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 5px;
        border-bottom: 2px solid #4CAF50;
    }

    header h2 {
        margin: 0;
        font-size: 16pt;
        color: #2E7D32;
    }

    header p {
        margin: 2px 0 0 0;
        font-size: 10pt;
        color: #555;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-size: 10pt;
    }

    table thead th {
        background-color: #4CAF50;
        color: #fff;
        font-weight: bold;
        text-align: center;
        padding: 8px;
    }

    table tbody td {
        padding: 6px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    table tbody tr:nth-child(even) {
        background-color: #f3f3f3;
    }

    table tbody tr:hover {
        background-color: #e0f2f1;
    }

    tfoot td {
        font-weight: bold;
        text-align: center;
        padding: 8px;
        background-color: #f2f2f2;
    }
</style>

<header>
    <h2>Laporan Kunjungan Tamu</h2>
    <p>Periode: {{ $start }} s/d {{ $end }}</p>
</header>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jumlah</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Keperluan</th>
            <th>Identitas</th>
            <th>No Daerah</th>
            <th>No Kartu</th>
            <th>No Polisi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporans as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->created_at->format('d M Y H:i') }}</td>
            <td>{{ $item->keluar ?? '-' }}</td>
            <td>{{ $item->keperluan ?? '-' }}</td>
            <td>{{ $item->identitas ?? '-' }}</td>
            <td>{{ $item->daerah ?? '-' }}</td>
            <td>{{ $item->nokartu ?? '-' }}</td>
            <td>{{ $item->nopol ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
