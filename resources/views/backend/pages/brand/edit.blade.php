@extends('backend.master')

@section('content')

<h1> Edit Brand</h1>

<form action="{{route('brand.update',$brands->id)}}" method="post">
        @csrf
        @method('put')
       <div class="form-group">
           <label for="">Enter Brand Name</label>
           <input  type="text" class="form-control" required name="brand_name" value="{{$brands->name}}" placeholder="Enter Brand Name">
       </div>

        <div class="form-group">
            <label for="">Enter Brand Description</label>
            <textarea name="description" class="form-control" placeholder="Enter Description"> {{$brands->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="status"> Select Status </label>
            <select name="status" class="form-control" id=""> 
                <option @if($brands->status=='Active') selected @endif value="Active"> Active </option>
                <option @if($brands->status=='Inactive') selected @endif value="Inactive"> Inactive</option>
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
