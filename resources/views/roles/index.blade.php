@extends('layout.layout')

@section('PageTitle', isset($pageTitle) ? PageTitle : 'roles')

@section('content')
    <h1>roles</h1>
    <div class="d-flex justify-content-end">
        <a href="{{route('roles.create')}}" class="btn btn-success">Add role</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Permissions</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($roles as $role)
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$role->name}}</td>
            <td>{{$role->permissions->pluck('name')}}</td>
            <td>
              <a href="{{ route('roles.edit',$role->id)}}" >
                <i class="fas fa-edit"></i>
                Edit
              </a>
              <form method="POST" action="{{route('roles.destroy', $role->id)}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Delete
              </form>
            </td>
          </tr>
            @endforeach
            
          
        </tbody>
      </table>
@endsection