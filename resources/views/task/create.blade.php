@extends('layout.layout')

@section('PageTitle', isset($pageTitle) ? pageTitle : 'Create Task')
@section('content')

<h1>Create Task</h1>

<form method="POST" action="{{route('task.store')}}">
    @csrf

    <input type="hidden" value="{{$project_id}}" name="project_id">


    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="title">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description" name="description">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Due Date</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description" name="due_date">
    </div>

    {{-- <div class="form-group">
        <label for="exampleInputEmail1">Priority</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Priority level" name="priority">
    </div> --}}

    <label for="priority">Priority:</label>
        <select name="priority" id="priority">
            <option value="{{ \App\Models\Task::PRIORITY_HIGH }}">High Priority</option>
            <option value="{{ \App\Models\Task::PRIORITY_MEDIUM }}">Medium Priority</option>
            <option value="{{ \App\Models\Task::PRIORITY_LOW }}">Low Priority</option>
        </select><br>

    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Status" name="status">
    </div>

    <div class="form-group col-md-4">
        <label for="inputState">Assigned User</label>
        <select id="inputState" class="form-control" name="user_id">
            @foreach ($users as $user)
          <option selected value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>
      </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection