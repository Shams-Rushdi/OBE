@extends('include.master')
@section('content')
@section('title','Events')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('event.update',$event->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

                <h4 class="header-title">Events</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Event Title</label>
                    <input class="form-control" type="text" name="title"value="{{old('title',$event->title)}}" id="example-text-input">

                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Event Type</label>
                    <select class="form-control form-select" name="type">
                            <option value="Paid" {{$event->type == "Paid" ? "selected" : ""}}>Paid</option>
                            <option value="Free" {{$event->type == "Free" ? "selected" : ""}}>Free</option>
                           
                    </select>

                    @error('type')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="form-control my-3">
                        <img src="{{asset('uploads/'.$event->image)}}" alt="" width="500px">
                    </div>

                    <label for="example-text-input" class="col-form-label">Events Image</label>
                    <input class="form-control" type="file" name="image" id="example-text-input">
                    @error('image')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Description</label>
                    <textarea id="editor" class="form-control" name="description" id="example-text-input">{{old('decription',$event->description)}}
                    </textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <label for="example-text-input" class="col-form-label">Events Price</label>
                    <input class="form-control" type="number" name="cost" id="example-text-input" value="{{old('cost',$event->cost)}}">
                    @error('cost')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Start Date</label>
                    <input class="form-control" type="date" name="start_date"value="{{old('start_date',$event->start_date)}}" id="example-text-input">
                    @error('start_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">End Date</label>
                    <input class="form-control" type="date" name="end_date" value="{{old('end_date',$event->end_date)}}" id="example-text-input">
                    @error('end_date')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Stat Time</label>
                    <input class="form-control" type="time" step="1" name="start_time"value="{{old('start_time',$event->start_time)}}" id="example-text-input">
                    @error('start_time')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <label for="example-text-input" class="col-form-label"></label>
                    <input class="form-control" type="hidden" name="user_id"value="{{Auth::user()->id}}" id="example-text-input" readonly>

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
