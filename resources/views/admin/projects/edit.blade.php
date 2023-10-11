@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    {{-- @include('projects.forms.upsert',= inserimento del componente upsert --}}
    {{-- passato come secondo argomento dell'include un array associativo 
        [
        'action' =>route('projects.update', project->id),
        'method' => 'PUT',
        'project' => $project,
    ]) --}}
    {{-- 'action' => route('projects.update', project->id), = specifichiamo dove vogliamo inviare i dati --}}
    {{-- 'method' => 'PUT', = specifichiamo il metodo su come devono essere inviati i dati. Questo metodo indica che stai cercando di effettuare un aggiorprojectnto dell'elemento associato --}}
    {{-- 'project' => $project,= assegniamo il valore a project così da poterlo utilizzare nel value e poter visualizzare i dati da editare --}}
    @include('admin.projects.forms.upsert', [
        'action' => route('admin.projects.update', $project->slug),
        'method' => 'PATCH',
        'project' => $project,
    ])
@endsection
