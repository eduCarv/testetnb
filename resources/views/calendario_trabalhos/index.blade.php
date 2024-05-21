@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calendários de Trabalho</h1>

    <!-- Adicionar formulário para criar calendário de trabalho para vários dias -->
    <div class="mb-3">
        <h2>Criar Calendário de Trabalho para Vários Dias</h2>
        <form action="{{ route('calendario_trabalhos.criarParaDias') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="empregado_id">Empregado</label>
                <select class="form-control" id="empregado_id" name="empregado_id" required>
                    @foreach ($empregados as $empregado)
                    <option value="{{ $empregado->id }}">{{ $empregado->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dias">Número de Dias</label>
                <input type="number" class="form-control" id="dias" name="dias" required min="1">
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;            
        }
    </style>

    <h2>Calendários de Trabalho Existente</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Empregado</th>
                <th>Setor</th>
                <th>Data</th>
                <th>Hora de Trabalho</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendariosTrabalho as $index => $calendario)
            <tr>
                <td>{{ $calendario->empregado->nome }}</td>
                <td>{{ $empregado->departamento->nome }}</td>
                <td>{{ date('d/m/Y', strtotime($calendario->data_de_trabalho)) }}</td>
                <td>{{ $calendario->hora_inicio }} às {{ $calendario->hora_fim }}</td>
            </tr>
            @if (($index + 1) % 8 == 0)
            <tr>
                <td colspan="4">
                    <hr>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection