@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Calendário de Trabalho</h1>    
    <form action="{{ route('calendario_trabalhos.store') }}" method="POST">
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
            <label for="data_de_trabalho">Data de Trabalho</label>
            <input type="date" class="form-control" id="data_de_trabalho" name="data_de_trabalho" required>
        </div>
        <div class="form-group">
            <label for="hora_inicio">Hora de Início</label>
            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
        </div>
        <div class="form-group">
            <label for="hora_fim">Hora de Fim</label>
            <input type="time" class="form-control" id="hora_fim" name="hora_fim" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</div>
@endsection
