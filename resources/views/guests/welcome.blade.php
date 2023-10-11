@extends('layouts.app')
@section('title', 'Boolean Portfolio')
@section('content')

    <a href="{{ route('admin.projects.create') }}">Create Project</a>
    <a href="{{ route('admin.projects.index') }}">Show all projects</a>

@endsection