@extends('layout.layout')

@section('PageTitle', isset($PageTitle) ? PageTitle : "Create StakeHolder")

@section('content')

<form method="POST" action="{{route('roles.update',$role->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" value="{{$role->name}}">
    </div>

      <div class="form-group col-md-4">
        <label for="inputState">Permissions</label>
        <br>
        @foreach ($permissions as $permission)

        <label id="{{$permission->id}}">{{$permission->name}} </label>
        <input type="checkbox" name="permission_ids[]" value="{{$permission->id}}" id="{{$permission->id}}">
        <br>
            
        @endforeach
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection