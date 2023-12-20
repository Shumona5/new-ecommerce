@extends('backend.master')


@section('content')

<h1>Categories</h1>


<a href="{{route('categories.create')}}" class="btn btn-success">Create</a>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($categories as $key=>$category)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$category->name}}</td>
            <td>
                <img height="100" width="150" src="{{url('/uploads/'.$category->image)}}" alt="">
            </td>
            <td>
                <a class="btn btn-primary" href="">View</a>
                <a class="btn btn-warning" href="{{route('categories.edit',$category->id)}}">Edit</a>
                <a class="btn btn-danger" href="">Delete</a> 
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{$categories->links()}}

@endsection