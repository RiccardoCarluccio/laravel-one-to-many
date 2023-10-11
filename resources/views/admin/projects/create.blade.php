@extends('layouts.app')
@section('title', 'Create')
@section('content')
    {{-- @include('projects.forms.upsert',= inserimento del componente upsert --}}
    {{-- passato come secondo argomento dell'include un array associatiovo 
        [
        'action' => route('projects.store'),
        'method' => 'POST',
        'project' => null,
    ]) --}}
    {{-- 'action' => route('projects.store'), = specifichiamo dove vogliamo inviare i dati --}}
    {{--  'method' => 'POST', = specifichiamo il metodo su come devono essere inviati i dati  --}}
    {{-- 'project' => null,= assegniamo il valore null perchè non abbiamo nessun dato da stampare --}}
    @include('admin.projects.forms.upsert', [
        'action' => route('admin.projects.store'),
        'method' => 'POST',
        'project' => null,
    ])
@endsection
