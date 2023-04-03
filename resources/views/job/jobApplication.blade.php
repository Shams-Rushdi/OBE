@extends('include.master')
@section('content')
@section('index','Apply for the Job')
@section('title','Job')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            <form class="form-valide" action="{{route('jobapplications.store')}}" method="post" enctype="multipart/form-data">
            @csrf

                <h4 class="header-title">Drop Your Resume</h4>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Upload Resume</label>
                    <input class="form-control" type="file" name="resume"value="{{old('resume')}}" id="example-text-input">

                    @error('company_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <input class="form-control" type="hidden" name="job_id"value="{{$job->id}}" id="example-text-input">

                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
<!-- main content area end -->
@endsection
