@extends('include.master')
@section('content')
@section('title','Job Category')



    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('jobcategories.update',$job_category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

                <h4 class="header-title">Job Category</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Job Category Title</label>
                    <input class="form-control" type="text" name="name" value="{{old('name',$job_category->name)}}" id="example-text-input">

                    @error('name')
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
