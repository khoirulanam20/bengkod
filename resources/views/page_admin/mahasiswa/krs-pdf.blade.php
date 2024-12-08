<!DOCTYPE html>
<html>
<head>
    <title>Kartu Rencana Studi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .student-info {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Kartu Rencana Studi (KRS)</h2>
    </div>

    <div class="student-info">
        <p><strong>Nama:</strong> {{ $mahasiswa->namaMhs }}</p>
        <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
        <p><strong>IPK:</strong> {{ $mahasiswa->ipk }}</p>
        <p><strong>SKS Maksimal:</strong> {{ $mahasiswa->sks }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Kelas</th>
                <th>Ruangan</th>
            </tr>
        </thead>
        <tbody>
            @if($mahasiswa->matakuliah)
                @php
                    $matakuliah_array = explode(',', $mahasiswa->matakuliah);
                @endphp
                @foreach($matakuliah_array as $index => $mk)
                    @if(trim($mk) != '')
                        @php
                            $matakuliah = \App\Models\JwlMatakuliah::where('matakuliah', trim($mk))->first();
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ trim($mk) }}</td>
                            <td>{{ $matakuliah ? $matakuliah->sks : '-' }}</td>
                            <td>{{ $matakuliah ? $matakuliah->kelp : '-' }}</td>
                            <td>{{ $matakuliah ? $matakuliah->ruangan : '-' }}</td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>