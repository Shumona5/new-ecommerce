@extends('backend.master')

@section('content')

    <h1>Brand List</h1>

    <a href="{{route('brand.create')}}" class="btn btn-success">Create Brand</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Description</th> 
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
       @foreach($brands as $key=>$brand)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$brand->name}}</td> 
            <td>{{$brand->description}}</td>
            <td>{{$brand->status}}</td>
            <td>
                <a class="btn btn-success" href="">Edit</a>
                <a href="" class="btn btn-primary">Show</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>

        </tr>
    @endforeach
        

        </tbody>
    </table>
    {{$brands->links()}}
@endsection
