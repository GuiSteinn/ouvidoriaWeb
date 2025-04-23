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

        Manifestacao::create($request->all());

        return redirect('/')->with('success', 'Sua manifestação foi enviada com sucesso!');
    }

    public function index()
    {
        $manifestacoes = Manifestacao::latest()->get();
        return view('manifestacao.index', compact('manifestacoes'));
    }

    public function show($id)
{
    $manifestacao = Manifestacao::findOrFail($id);

    // Se ainda estiver como "pendente", muda para "visualizado"
    if ($manifestacao->status === 'pendente') {
        $manifestacao->status = 'visualizado';
        $manifestacao->save();
    }

    return view('manifestacao.show', compact('manifestacao'));
}
}
