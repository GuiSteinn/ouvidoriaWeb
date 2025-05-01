<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admin - Lista de Manifestações</title>
</head>
<body>
    <h1>Lista de Manifestações</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($manifestacoes as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ ucfirst($m->tipo) }}</td>
                    <td>{{ ucfirst($m->status) }}</td>
                    <td>{{ $m->created_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('admin.show', $m->id) }}">Ver</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>