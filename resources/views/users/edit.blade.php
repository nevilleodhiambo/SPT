@extends('layout.layout')

@section('PageTitle', isset($PageTitle) ? PageTitle : "Create StakeHolder")

@section('content')

<form method="POST" action="{{route('users.update',$user->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" value="{{$user->name}}">
    </div>

      <div class="form-group col-md-4">
        <label for="inputState">Role</label>
        <select id="inputState" class="form-control" name="role">
            @foreach ($roles as $role)
          <option selected value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
        </select>
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection