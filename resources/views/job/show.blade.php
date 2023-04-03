@extends('include_sa.master')
@section("content")
<body>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-7" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text">{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<div class="container mt-8">
  <h4>{{ $job->job_title }}</h4>
  <div class="row mt-4">
    <div class="col-md-6">
      <div class="mb-2">
        <i class="fas fa-building"></i>
        <strong>Company Name:</strong>
        <span class="">{{ $job->company_name }}</span>
      </div>
      <div class="mb-2">
        <i class="fas fa-folder-open"></i>
        <strong>Job Category:</strong>
        <span class="text-info">{{ $job->jobCategory ->name ?? ''}}</span>
      </div>
      <div class="mb-2">
        <i class="fas fa-map-marker-alt"></i>
        <strong>Job Location:</strong>
        <span class="">{{ $job->job_location }}</span>
      </div>
      <div class="mb-2">
        <i class="fas fa-money-bill"></i>
        <strong>Salary:</strong>
        <span class="">{{ $job->salary }}</span>
      </div>
      <div class="mb-2">
        <i class="fas fa-external-link-alt"></i>
        <strong>Website:</strong>
        <a href="https://{{ $job->web_url }}" class="text-info" target="_blank">{{ $job->web_url }}</a>
      </div>
      <div class="mb-2">
        <i class="fas fa-envelope"></i>
        <strong>Email:</strong>
        <a href="mailto:{{ $job->contact_email }}" class="text-info">{{ $job->contact_email }}</a>
      </div>
      <div class="mb-2">
        <i class="fas fa-phone"></i>
        <strong>Contact:</strong>
        <span class="">{{ $job->phone }}</span>
      </div>
      <div class="mb-2">
        <i class="far fa-clock"></i>
        <strong>Deadline:</strong>
        <span class="">{{ \Carbon\Carbon::parse($job->deadline)->format('F j, Y') }}</span>
      </div>
    </div>
    <div class="col-md-6">

      <div class="mb-2">
        <span class=""><img class="shadow-lg rounded" src="{{$job->image ?  asset('uploads/'.$job->image) : asset('images/jobs/default-job-logo.jpg')}}" alt="company_logo" style="height: 200px; width:300px"></span>
      </div>

    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-6">
      <p> {!! htmlspecialchars_decode($job->description) !!} </p>
    </div>
  </div>
<!-- Button trigger modal -->
<button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Apply Now
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Your Resume</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('jobapplications.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <label>Upload PDF / Word Documents</label>
          <input type="file" name="resume">
        </div>
        <input type="hidden" name="job_id" value="{{$job->id}}">
        <div class="modal-footer">
          <button type="submit" class="btn bg-gradient-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
@endsection
