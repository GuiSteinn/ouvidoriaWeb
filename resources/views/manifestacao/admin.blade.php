@extends('layouts.app')

@section('title', 'Admin - Todas as Manifestações')

@section('content')
    <h1>Todas as Manifestações</h1>

    @if($manifestacoes->isEmpty())
        <p>Nenhuma manifestação cadastrada.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Mensagem</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manifestacoes as $manifestacao)
                    <tr>
                        <td>{{ $manifestacao->id }}</td>
                        <td>{{ $manifestacao->nome ?? 'Anônimo' }}</td>
                        <td>{{ $manifestacao->email ?? 'Não informado' }}</td>
                        <td>{{ ucfirst($manifestacao->tipo) }}</td>
                        <td>{{ ucfirst($manifestacao->status) }}</td>
                        <td>{{ $manifestacao->mensagem }}</td>
                        <td>{{ $manifestacao->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('manifestacao.show', $manifestacao->id) }}">Ver Detalhes</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection