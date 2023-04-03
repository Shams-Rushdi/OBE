@extends('include.master')
@section('content')
@section('title','Department')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('departments.update',$department->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <h4 class="header-title">Department</h4><br><br>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Department Name</label>
                    <input class="form-control" type="text" name="name" value="{{old('name',$department->name)}}" id="example-text-input">

                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Department Description</label>
                    <textarea class="form-control" type="text" name="description"  id="example-text-input">
                        {{old('description',$department->description)}}
                    </textarea>
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-control my-3">
                        <img src="{{asset('uploads/'.$department->image)}}" alt="" width="500px">
                    </div>

                    <label for="example-text-input" class="col-form-label">Department Image</label>
                    <input class="form-control" type="file" name="image" id="example-text-input">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
<!-- main content area end -->
@endsection
