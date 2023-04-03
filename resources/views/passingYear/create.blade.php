@extends('include.master')
@section('content')
@section('title','Passing Year')


    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('passingyears.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <h4 class="header-title">Passing Year</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Passing Year Title</label>
                    <input class="form-control" type="text" name="passing_year" value="{{old('passing_year')}}" id="example-text-input">

                    @error('passing_year')
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
