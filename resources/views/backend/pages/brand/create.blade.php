@extends('backend.master')

@section('content')

<form action="{{route('brand.store')}}" method="post">
        @csrf

       <div class="form-group">
           <label for="">Enter Brand Name</label>
           <input  type="text" class="form-control" required name="brand_name" placeholder="Enter Brand Name">
       </div>

        <div class="form-group">
            <label for="">Enter Brand Description</label>
            <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
        </div>

        <div class="form-group">
            <label for="status"> Select Status </label>
            <select class="form-control" id=""> 
                <option value="Active"> Active </option>
                <option value="Inactive"> Inactive</option>
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
