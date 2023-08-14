@extends('layout.layout')

@section('pageTitle', isset($pageTitle) ? pageTitle: 'Create Projects')

@section('content')
<h1>Create Project</h1>

<form method="POST" action="{{route('project.update', $project->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="title" value="{{$project->title}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description" name="description" value="{{$project->description}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Start Date</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description" name="start_date" value="{{$project->start_date}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">End Date</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description" name="end_date" value="{{$project->end_date}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Status" name="status" value="{{$project->status}}">
    </div>
   
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection