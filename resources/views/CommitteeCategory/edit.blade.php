@extends('include.master')
@section('content')
@section('title','Committee')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('committeecategory.update',$committeecategory->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <h4 class="header-title">Edit Committee</h4><br><br>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{old('name',$committeecategory->name)}}" id="example-text-input">

                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Description</label>
                    <input class="form-control" type="text" name="description"  id="example-text-input">
                        {{old('description',$committeecategory->description)}}
                    
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
