<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Manifestação</title>
</head>
<body>
    <h1>Ouvidoria Municipal</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('manifestacao.store') }}">
        @csrf

        <label>Nome (opcional):</label><br>
        <input type="text" name="nome"><br><br>

        <label>Email (opcional):</label><br>
        <input type="email" name="email"><br><br>

        <label>Tipo:</label><br>
        <select name="tipo" required>
            <option value="reclamação">Reclamação</option>
            <option value="elogio">Elogio</option>
            <option value="sugestão">Sugestão</option>
            <option value="denúncia">Denúncia</option>
        </select><br><br>

        <label>Mensagem:</label><br>
        <textarea name="mensagem" rows="5" required></textarea><br><br>

        <button type="submit">Enviar Manifestação</button>
    </form>
</body>
</html>
