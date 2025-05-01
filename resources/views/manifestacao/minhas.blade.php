<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Manifestações</title>
</head>
<body>
    <h1>Minhas Manifestações</h1>

    <p><strong>Email:</strong> {{ $email }}</p>

    @if($manifestacoes->isEmpty())
        <p>Você ainda não enviou nenhuma manifestação.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Mensagem</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manifestacoes as $manifestacao)
                    <tr>
                        <td>{{ $manifestacao->id }}</td>
                        <td>{{ ucfirst($manifestacao->tipo) }}</td>
                        <td>{{ ucfirst($manifestacao->status) }}</td>
                        <td>{{ $manifestacao->mensagem }}</td>
                        <td>{{ $manifestacao->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="/">Voltar</a>
</body>
</html>