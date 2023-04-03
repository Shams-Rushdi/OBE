@extends('include.master')
@section('content')
@section('index','Update Speaker info')
@section('title','Speaker')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('speakers.update',$speaker->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

                <h4 class="header-title">Speaker</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Speaker Name</label>
                    <input class="form-control" type="text" name="name"value="{{old('name',$speaker->name)}}" id="example-text-input">

                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Speaker Email</label>
                    <input class="form-control" type="text" name="email"value="{{old('email',$speaker->email)}}" id="example-text-input">

                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                    <label for="example-text-input" class="col-form-label">bio</label>
                    <textarea id="editor" class="form-control" name="bio" id="example-text-input">{{old('bio',$speaker->bio)}}
                    </textarea>
                    @error('bio')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Select Workshop</label>
                        <select name="workshop_id" class="form-control py-2">
                            <option value="">Select an Option</option>
                            @foreach ($workshops as $workshop)
                                <option value="{{$workshop->id}}" {{$speaker->workshop_id == $workshop->id ? 'selected': ''}}>{{$workshop->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-control my-3">
                        <img src="{{asset('uploads/'.$speaker->image)}}" alt="" width="500px">
                    </div> --}}


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
