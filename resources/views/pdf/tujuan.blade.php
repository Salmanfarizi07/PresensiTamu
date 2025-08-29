<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Tujuan {{ $unit }}</title>
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
            text-transform: uppercase;
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
            table-layout: auto;
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
</head>
<body>

    <header>
        <h2>Laporan Kunjungan {{ strtoupper($unit) }} Semarang</h2>
        <p>Periode: 
            @if($filter === 'range')
                {{ \Carbon\Carbon::parse($start)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
            @else
                {{ ucfirst($filter) }}
            @endif
        </p>
        <p>Tanggal Cetak: {{ now()->format('d M Y H:i') }}</p>
    </header>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Unit/Instansi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $i => $row)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->unit }}</td>
            @empty
            <tr>
                <td colspan="3">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total Kunjungan PIC: {{ count($data) }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
