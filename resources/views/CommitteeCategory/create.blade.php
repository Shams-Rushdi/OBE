@extends('include.master')
@section('content')
@section('title','Committee')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('committeecategory.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <h4 class="header-title">Add Committee</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}" id="example-text-input">

                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Description</label>
                    <textarea class="form-control" type="text" name="description"  id="example-text-input">
                        {{old('description')}}
                    </textarea>
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
