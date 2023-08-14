@extends('layout.layout')

@section('pageTitle', isset($pageTitle) ? pageTitle: 'Projects')

@section('content')
<h1>Projects</h1>
<div class="d-flex justify-content-end">
<a href="{{route('project.create')}}" class="btn btn-success">Add A Project</a>

</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($projects as $project)
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$project->title}}</td>
        <td>{{$project->description}}</td>
        <td>{{$project->start_date}}</td>
        <td>{{$project->end_date}}</td>
        <td>{{$project->status}}</td>
        <td>
            @can('edit')
            <a href="{{ route('project.edit', $project->id) }}">
                <i class="fas fa-edit"></i>
            </a>
            @endcan
            
            <a href="{{route('project.show', $project->id)}}" >
                <i class="fas fa-eye"></i>
            </a>
            
            @can('delete')
            <form method="POST" action="{{route('project.destroy', $project->id)}}">
                 @csrf
                 @method('delete')
                <i class="fas fa-trash"></i>

            </form>
            @endcan
        </td>
      </tr>
        @endforeach
       
     
    </tbody>
  </table>
@endsection