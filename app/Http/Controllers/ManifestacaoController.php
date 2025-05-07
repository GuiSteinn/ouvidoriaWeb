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
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tipo' => 'required|string|max:255',
            'mensagem' => 'required|string',
        ]);

        Manifestacao::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'tipo' => $validatedData['tipo'],
            'mensagem' => $validatedData['mensagem'],
            'status' => 'Pendente',
        ]);

        return redirect()->back()->with('success', 'Manifestação cadastrada com sucesso!');
    }

    public function index()
    {
        $manifestacoes = Manifestacao::latest()->get();
        return view('manifestacao.index', compact('manifestacoes'));
    }

    public function show($id)
    {
        $manifestacao = Manifestacao::findOrFail($id);
    
        $manifestacao->update(['status' => 'Visualizada']);
    
        return view('manifestacao.show', compact('manifestacao'));
    }
}
