@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Empregados</h1>
    <a href="{{ route('empregados.create') }}" class="btn btn-primary">Adicionar Empregado</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Idade</th>
                <th>Departamento</th>                
            </tr>
        </thead>
        <tbody>
            @foreach($empregados as $empregado)
            <tr>
                <td>{{ $empregado->nome }}</td>
                <td>{{ $empregado->email }}</td>
                <td>{{ $empregado->cpf }}</td>
                <td>{{ $empregado->idade }}</td>
                <td>{{ $empregado->departamento ? $empregado->departamento->nome : 'N/A' }}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
