<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Manifestação</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Nova Manifestação')

@section('content')
    <h1>Nova Manifestação</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('manifestacao.store') }}" method="POST">
        @csrf

        @guest
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Seu nome"><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Seu email"><br><br>
        @endguest

        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="reclamacao">Reclamação</option>
            <option value="elogio">Elogio</option>
            <option value="sugestao">Sugestão</option>
        </select><br><br>

        <label for="mensagem">Mensagem:</label>
        <textarea name="mensagem" id="mensagem" required></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
@endsection
</body>
</html>
