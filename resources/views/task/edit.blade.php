@extends('layout.layout')

@section('PageTitle', isset($pageTitle) ? pageTitle : 'Create Task')
@section('content')

<h1>Create Task</h1>

<form method="POST" action="{{route('task.update', $task->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="title" value="{{$task->title}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description" name="description" value="{{$task->description}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Due Date</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description" name="due_date" value="{{$task->due_date}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Priority</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Priority level" name="priority" value="{{$task->priority}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Status" name="status" value="{{$task->status}}">
    </div>

    <div class="form-group col-md-4">
        <label for="inputState">Assigned User</label>
        <select id="inputState" class="form-control" name="user_id" value="{{$task->user_id}}">
            @foreach ($users as $user)
          <option selected value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>
      </div>
   
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
    
@endsection