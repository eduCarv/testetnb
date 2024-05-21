<?php

namespace App\Http\Controllers;

use App\Models\CalendarioTrabalho;
use App\Models\Empregado;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarioTrabalhoController extends Controller
{
    public function index()
    {
        $empregados = Empregado::all();
        $calendariosTrabalho = CalendarioTrabalho::all(); 
        $departamentos = Departamento::all();

        return view('calendario_trabalhos.index', compact('empregados', 'calendariosTrabalho', 'departamentos'));
    }


    public function create()
    {
        $empregados = Empregado::all();
        return view('calendario_trabalhos.create', compact('empregados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empregado_id' => 'required|exists:empregados,id',
            'data_de_trabalho' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fim' => 'required|date_format:H:i',
        ]);

        CalendarioTrabalho::create($request->all());
        return redirect()->route('calendario_trabalhos.index');
    }

    public function show(CalendarioTrabalho $calendarioTrabalho)
    {
        return view('calendario_trabalhos.show', compact('calendarioTrabalho'));
    }

    public function showByEmpregado(Empregado $empregado)
    {
        $calendariosDeTrabalho = $empregado->calendariosDeTrabalho;
        return view('calendario_trabalhos.show_by_empregado', compact('calendariosDeTrabalho', 'empregado'));
    }

    public function createForDays()
    {
        $empregados = Empregado::all();
        return view('calendario_trabalhos.create-for-days', compact('empregados'));
    }

    public function criarCalendarioParaDias(Request $request)
    {
        $request->validate([
            'empregado_id' => 'required|exists:empregados,id',
            'dias' => 'required|integer|min:1',
        ]);

        $empregado = Empregado::findOrFail($request->empregado_id);
        $dias = $request->dias;
        $calendarios = [];

        $dataAtual = Carbon::now();
        for ($i = 0; $i < $dias; $i++) {
            $data = $dataAtual->copy()->addDays($i)->format('Y-m-d');
            for ($hora = 9; $hora < 18; $hora++) {
                if ($hora != 12) {
                    $hora_inicio = $hora < 10 ? "0$hora:00:00" : "$hora:00:00";
                    $hora_fim = $hora + 1 < 10 ? "0" . ($hora + 1) . ":00:00" : ($hora + 1) . ":00:00";
                    $calendarios[] = [
                        'empregado_id' => $empregado->id,
                        'data_de_trabalho' => $data,
                        'hora_inicio' => $hora_inicio,
                        'hora_fim' => $hora_fim,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        CalendarioTrabalho::insert($calendarios);

        return redirect()->route('calendario_trabalhos.index')->with('success', 'Calendário de trabalho criado com sucesso para os próximos ' . $dias . ' dias.');
    }
}
