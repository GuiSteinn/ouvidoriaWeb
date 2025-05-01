<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Manifestação</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Detalhes da Manifestação')

    @section('content')
        <h1>Detalhes da Manifestação #{{ $manifestacao->id }}</h1>

        <p><strong>Nome:</strong> {{ $manifestacao->nome ?? 'Anônimo' }}</p>
        <p><strong>Email:</strong> {{ $manifestacao->email ?? 'Não informado' }}</p>
        <p><strong>Tipo:</strong> {{ ucfirst($manifestacao->tipo) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($manifestacao->status) }}</p>
        <p><strong>Mensagem:</strong><br>{{ $manifestacao->mensagem }}</p>
        <p><strong>Data:</strong> {{ $manifestacao->created_at->format('d/m/Y H:i') }}</p>

        <a href="{{ route('admin.index') }}">Voltar</a>
    @endsection
</body>
</html>