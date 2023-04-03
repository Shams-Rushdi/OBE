@extends('include.master')
@section('content')
@section('title','Events')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

                <h4 class="header-title">Events</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Event Title</label>
                    <input class="form-control" type="text" name="title"value="{{old('title')}}" id="example-text-input">

                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Event Type</label>
                    <select class="form-control form-select" name="type">
                        <option selected="selected">Select Event Type</option>
                            <option value=""> Select an Event Type </option>
                            <option value="Paid">Paid</option>
                            <option value="Free">Free</option>
                    </select>

                    @error('type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Events Image</label>
                    <input class="form-control" type="file" name="image" id="example-text-input">
                    @error('image')
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

                    <label for="example-text-input" class="col-form-label">Events Price</label>
                    <input class="form-control" type="number" name="cost" id="example-text-input">
                    @error('cost')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Start Date</label>
                    <input class="form-control" type="date" name="start_date"value="{{old('start_date')}}" id="example-text-input">
                    @error('start_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">End Date</label>
                    <input class="form-control" type="date" name="end_date"value="{{old('end_date')}}" id="example-text-input">
                    @error('end_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Stat Time</label>
                    <input class="form-control" type="time" step="1" name="start_time"value="{{old('start_time')}}" id="example-text-input">
                    @error('start_time')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>


                </div>

                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
