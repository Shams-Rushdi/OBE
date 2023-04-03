@extends('include.master')
@section('content')
@section('title','Advertisement')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('advertisements.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

                <h4 class="header-title">Create Advertisement</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Advertisement Name</label>
                    <input class="form-control" type="text" name="name"value="{{old('name')}}" id="example-text-input">

                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Advertisement Title</label>
                    <input class="form-control" type="text" name="title"value="{{old('title')}}" id="example-text-input">

                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Description</label>
                    <textarea id="editor" class="form-control" name="description" id="example-text-input">{{old('decription')}}
                    </textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <label for="example-text-input" class="col-form-label">Advertisement Image</label>
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
