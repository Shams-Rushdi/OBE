@extends('include.master')
@section('content')
@section('title','Course')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <h4 class="header-title">Department</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Title</label>
                    <input class="form-control" type="text" name="title" value="{{old('title')}}" id="example-text-input">

                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-form-label">Course Category</label>
                    <select class="form-control form-select" name="course_category_id">
                        <option selected="selected">Select course Category</option>
                            @foreach($category as $key => $value)
                            <option value="{{$value->id}}">{{ $value->name }}</option>
                            @endforeach
                    </select>
                </div>                

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Course Description</label>
                    <textarea id="editor" class="form-control" type="text" name="description"  id="example-text-input">
                        {{old('description')}}
                    </textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Add Thumbnail</label>
                    <input class="form-control" type="file" name="image" id="example-text-input">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">YouTube Link</label>
                    <input class="form-control" type="text" name="youtube_url" value="{{old('youtube_url')}}" id="example-text-input">

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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
