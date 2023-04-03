@extends('include.master')
@section('content')
@section('title','Course')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('course.update',$course->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <h4 class="header-title">Edit Course</h4><br><br>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Course Title</label>
                    <input class="form-control" type="text" name="title" value="{{old('title',$course->title)}}" id="example-text-input">

                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label">Course Category</label>
                    <select class="form-control form-select" name="course_category_id">
                        <option selected="selected">Select course Category</option>
                            @foreach($category as $key => $value)
                            <option value="{{$value->id}}" {{$course->course_category_id === $key}}>{{ $value->name }}</option>
                            @endforeach
                    </select>
                </div>                

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Course Description</label>
                    <textarea id="editor" class="form-control" type="text" title="description"  id="example-text-input">
                        {{old('description',$course->description)}}
                    </textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-control my-3">
                    <img src="{{asset('uploads/'.$course->image)}}" alt="" width="300px">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Thumbnail
                    </label>
                    <input class="form-control" type="file" title="image" id="example-text-input">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">YouTube Link</label>
                    <input class="form-control" type="text" title="youtube_url" value="{{old('youtube_url',$course->youtube_url)}}"  id="example-text-input">
                        {{old('youtube_url',$course->youtube_url)}}
                    @error('youtube_url')
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
