@extends('backend.master')
@section('content')

<h1>  User's List </h1>
<br>
<a href="{{route('user.create')}}" class="btn btn-primary"> Add New Use </a>


<table class="table">
    <thead>
      <tr>
        <th scope="col">id </th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Role</th>
        
        <th scope="col">Contact</th>
        {{-- <th scope="col">Action</th> --}}
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $key=>$data )
            
        
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->image}}</td>
        <td>{{$data->role}}</td>
        
        <td>{{$data->contact}}</td>
        
      </tr>
      @endforeach  
    </tbody>
  </table>

@endsection