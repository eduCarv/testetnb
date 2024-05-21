@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Departamentos</h1>
    <a href="{{ route('departamentos.create') }}" class="btn btn-primary">Adicionar Departamento</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>                
            </tr>
        </thead>
        <tbody>
            @foreach($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->nome }}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
