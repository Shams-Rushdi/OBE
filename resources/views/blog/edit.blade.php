@extends('include.master')
@section('content')
@section('title','Blog Post')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <h4 class="header-title">Blog Post</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Blog Post Title</label>
                    <input class="form-control" type="text" name="title" value="{{old('title',$blog->title)}}" id="example-text-input">

                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Blog Post Author</label>
                    <input class="form-control" type="text" name="author" value="{{old('author',$blog->author)}}" id="example-text-input">

                    @error('author')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-control my-3">
                        <img src="{{asset('uploads/'.$blog->image)}}" alt="" width="500px">
                    </div>

                    <label for="example-text-input" class="col-form-label">Blog Image</label>
                    <input class="form-control" type="file" name="image" id="example-text-input">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Blog Post Video (link)</label>
                    <input class="form-control" type="text" name="video" value="{{old('video',$blog->video)}}" id="example-text-input">

                    @error('video')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Content</label>
                    <textarea id="editor" class="form-control" type="text" name="content" rows="4" id="example-text-input">
                        {{old('content',$blog->content)}}
                    </textarea>
                    @error('content')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label">Select Category</label>
                    <select name="category_id" class="form-control py-2">
                        <option value="">Select an Option</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$blog->category_id == $category->id ? 'selected': ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
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
