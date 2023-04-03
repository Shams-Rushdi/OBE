@extends('include.master')
@section('content')
@section('title','Job')

    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('jobs.update',$job->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

                <h4 class="header-title">Edit Job</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Company Name</label>
                    <input class="form-control" type="text" name="company_name"value="{{old('company_name',$job->company_name)}}" id="example-text-input">

                    @error('company_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Job Title</label>
                    <input class="form-control" type="text" name="job_title"value="{{old('job_title',$job->job_title)}}" id="example-text-input">

                    @error('job_title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label class="col-form-label">Select Category</label>
                    <select name="job_category_id" class="form-control py-2">
                        @foreach ($job_categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $job->job_category_id ? 'selected': ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Description</label>
                    <textarea  id="editor" class="form-control" name="description" id="example-text-input">{{old('decription',$job->description)}}
                    </textarea>
                    @error('description')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>

                    <label for="example-text-input" class="col-form-label">Job Location</label>
                    <input class="form-control" type="text" name="job_location"value="{{old('job_location',$job->job_location)}}" id="example-text-input">

                    @error('job_location')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Contact Email</label>
                    <input class="form-control" type="text" name="contact_email"value="{{old('contact_email',$job->contact_email)}}" id="example-text-input">

                    @error('contact_email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Website</label>
                    <input class="form-control" type="text" name="web_url"value="{{old('web_url',$job->web_url)}}" id="example-text-input">

                    @error('web_url')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Phone</label>
                    <input class="form-control" type="text" name="phone"value="{{old('phone',$job->phone)}}" id="example-text-input">

                    @error('phone')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Salary</label>
                    <input class="form-control" type="text" name="salary"value="{{old('salary',$job->salary)}}" id="example-text-input">

                    @error('salary')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <label for="example-text-input" class="col-form-label">Deadline</label>
                    <input class="form-control" type="date" name="deadline" id="example-text-input" value="{{old('deadline',$job->deadline)}}">
                    @error('deadline')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                    <div class="form-control my-3">
                        <img src="{{asset('uploads/'.$job->image)}}" alt="" width="500px">
                    </div>

                    <label for="example-text-input" class="col-form-label">Company Logo</label>
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>



<!-- main content area end -->
@endsection
