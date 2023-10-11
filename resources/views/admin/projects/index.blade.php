@extends('layouts.app')
@section('title', 'Index')
@section('content')

  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Url</th>
        <th>Publication Date</th>
        <th>Description</th>
        <th>Slug</th>
      </tr>
    </thead>

    <tbody>
      @foreach($projects as $project)
        <tr>
          <td><a href="{{ route("admin.projects.show", $project->slug) }}">{{ $project->title }}</a></td>
          <td>{{ $project->url }}</td>
          <td>{{ $project->publication_date }}</td>
          <td>{{ $project->description }}</td>
          <td>{{ $project->slug }}</td>
          <td>
            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
              @csrf()
              @method("DELETE")
            
              <button class="btn btn-danger">Elimina</button>
            </form>
          </td>
        </tr>        
      @endforeach
    </tbody>
  </table>

@endsection
