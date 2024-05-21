<?php

use App\Http\Controllers\EmpregadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\CalendarioTrabalhoController;

Route::resource('empregados', EmpregadoController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('calendario_trabalhos', CalendarioTrabalhoController::class);

// Rota para criar a lista de trabalho para os próximos N dias
Route::post('calendario_trabalhos/criar-para-dias', [CalendarioTrabalhoController::class, 'criarCalendarioParaDias'])->name('calendario_trabalhos.criarParaDias');
Route::get('calendario_trabalhos/create-for-days', [CalendarioTrabalhoController::class, 'createForDays'])->name('calendario_trabalhos.createForDays');

// Rotas para mostrar dados específicos
Route::get('calendario_trabalhos/empregado/{empregado}', [CalendarioTrabalhoController::class, 'showByEmpregado']);
