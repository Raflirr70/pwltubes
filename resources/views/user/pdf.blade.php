<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Daftar Pegawai</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Cabang</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->toko->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
