<?php

namespace App\Http\Controllers;

use App\Models\Manifestacao;
use Illuminate\Http\Request;

class ManifestacaoController extends Controller
{
    public function create()
    {
        return view('manifestacao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'mensagem' => 'required',
        ]);

        // Verifica se o usuário está autenticado
        $nome = auth()->check() ? auth()->user()->name : $request->nome;
        $email = auth()->check() ? auth()->user()->email : $request->email;

        Manifestacao::create([
            'nome' => $nome,
            'email' => $email,
            'tipo' => $request->tipo,
            'mensagem' => $request->mensagem,
            'status' => 'pendente', // Status padrão
        ]);

        return redirect()->route('manifestacao.create')->with('success', 'Sua manifestação foi enviada com sucesso!');
    }

    public function index()
    {
        // Busca todas as manifestações
        $manifestacoes = Manifestacao::all();

        // Retorna a view com as manifestações
        return view('manifestacao.admin', compact('manifestacoes'));
    }

    public function show($id)
    {
        // Busca a manifestação pelo ID
        $manifestacao = Manifestacao::findOrFail($id);

        // Retorna a view com os detalhes da manifestação
        return view('manifestacao.show', compact('manifestacao'));
    }
}