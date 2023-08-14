@extends('layout.layout')

@section('PageTitle', isset($pageTitle) ? PageTitle : 'StakeHolders')

@section('content')
    <h1>StakeHolders</h1>
    <div class="d-flex justify-content-end">
        <a href="{{route('stakeholder.create')}}" class="btn btn-success">Add StakeHolder</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Number</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($stakeholders as $stakeholder)
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$stakeholder->name}}</td>
            <td>{{$stakeholder->email}}</td>
            <td>{{$stakeholder->number}}</td>
            <td>{{$stakeholder->role_id}}</td>
          </tr>
            @endforeach
            
          
        </tbody>
      </table>
@endsection