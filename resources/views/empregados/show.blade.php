@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Empregado</h1>
    <p><strong>Nome:</strong> {{ $empregado->nome }}</p>
    <p><strong>Email:</strong> {{ $empregado->email }}</p>
    <p><strong>CPF:</strong> {{ $empregado->cpf }}</p>
    <p><strong>Idade:</strong> {{ $empregado->idade }}</p>
    <p><strong>Departamento:</strong> {{ $empregado->departamento ? $empregado->departamento->nome : 'N/A' }}</p>
    <a href="{{ route('empregados.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection
