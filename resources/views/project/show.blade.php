@extends('layout.layout')

@section('pageTitle', isset($pageTitle) ? pageTitle: 'Tasks')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{route('task.create',['project_id' => $project->id])}}" class="btn btn-small btn-success">Add a Task</a>
</div>

<h1>{{$project->name}}</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Due Date</th>
        <th scope="col">Priority</th>
        <th scope="col">Status</th>
        <th scope="col">Assigned User</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($tasks as $task)
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$task->title}}</td>
        <td>{{$task->due_date}}</td>
        <td>{{$task->priority}}</td>
        <td>{{$task->status}}</td>
        <td>{{$task->user_id}}</td>
        <td>
          @can('edit')
            <a href="{{route('task.edit', $task->id)}}">
                <i class="fas fa-eye">Edit</i>
            </a>
            @endcan
            @can('delete')
            <form method="POST" action="{{route('task.destroy', $task->id)}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash">Delete</i>
            </form>
            @endcan
        </td>       
         </tr>
        @endforeach
        
   
    </tbody>
  </table>

@endsection