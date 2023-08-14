@extends('layout.layout')

@section('PageTitle', isset($pageTitle) ? PageTitle : 'users')

@section('content')
    <h1>users</h1>
    <div class="d-flex justify-content-end">
        <a href="{{route('users.create')}}" class="btn btn-success">Add user</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($users as $user)
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->roles->pluck('name')}}</td>
            <td>
              <a href="{{ route('users.edit',$user->id)}}" class="btn btn-small btn-primary">
                Edit
              </a>
              <form method="POST" action="{{route('users.destroy', $user->id)}}">
              @csrf 
              @method('delete')
              <button type="submit" value="Delete" class="btn btn-small btn-danger">
                <i class="fas fa-trash"></i>
              </form>
            </td>
          </tr>
            @endforeach
            
          
        </tbody>
      </table>
@endsection