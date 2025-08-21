<style>
    body { font-family: sans-serif; font-size: 11pt; }
    h2, p { text-align: center; margin: 0; }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    table, th, td {
        border: 1px solid #444;
    }
    th {
        background: #f2f2f2;
        text-align: center;
        font-weight: bold;
        padding: 6px;
    }
    td {
        padding: 6px;
        text-align: center;
    }
</style>


<h2 style="text-align:center;">Laporan Data Tamu</h2>
<p style="text-align:center;">Periode: {{ $start }} s/d {{ $end }}</p>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Keperluan</th>
            <th>Identitas</th>
            <th>No Daerah Bebas/Terbatas</th>
            <th>No Kartu</th>
            <th>No Polisi</th>
            <th>Dikirim</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tamu as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->nohp }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->masuk }}</td>
            <td>{{ $row->keluar }}</td>
            <td>{{ $row->keperluan }}</td>
            <td>{{ $row->identitas }}</td>
            <td>{{ $row->daerah }}</td>
            <td>{{ $row->nokartu }}</td>
            <td>{{ $row->nopol }}</td>
            <td>{{ $row->created_at->format('d M Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
