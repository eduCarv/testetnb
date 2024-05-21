<?php

namespace App\Http\Controllers;

use App\Models\Empregado;
use App\Models\Departamento;
use Illuminate\Http\Request;

class EmpregadoController extends Controller
{
    public function index()
    {        
        $empregados = Empregado::with('departamento')->get();
        return view('empregados.index', compact('empregados'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('empregados.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'idade' => 'required|integer',
            'departamento_id' => 'required|exists:departamentos,id'
        ]);

        Empregado::create($request->all());
        return redirect()->route('empregados.index');
    }

    public function show(Empregado $empregado)
    {
        return view('empregados.show', compact('empregado'));
    }

    public function edit(Empregado $empregado)
    {
        $departamentos = Departamento::all();
        return view('empregados.edit', compact('empregado', 'departamentos'));
    }

    public function update(Request $request, Empregado $empregado)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'idade' => 'required|integer',
            'departamento_id' => 'required|exists:departamentos,id'
        ]);

        $empregado->update($request->all());
        return redirect()->route('empregados.index');
    }

    public function destroy(Empregado $empregado)
    {
        $empregado->delete();
        return redirect()->route('empregados.index');
    }
}
