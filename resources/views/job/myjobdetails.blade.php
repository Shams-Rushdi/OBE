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
  <h3>{{ $job->job_title }}</h3>
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
        <span class="text-info">{{ $job->jobCategory ->name}}</span>
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
        <a href="{{ $job->web_url }}" class="text-info">{{ $job->web_url }}</a>
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
    <div class="col-md-12">
      <p> {!! htmlspecialchars_decode($job->description) !!} </p>
    </div>
  </div>

<div class="card">
  <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Applicant</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>


          <th class="text-secondary opacity-7"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($job_applications as $item)
          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="{{$item->user->profile_image ? asset('images/profile/'.$item->user->profile_image):asset('images/profile/profile.jpg')}}" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">{{$item->user->name}}</h6>
                  <p class="text-xs text-secondary mb-0">{{$item->user->email}}</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">{{$item->user->phone_number}}</p>
            </td>

            <td class="align-middle">
              <a href="{{asset('uploads/'.$item->resume)}}" class="btn btn-info" data-toggle="tooltip" data-original-title="Edit user" download>
                <i class="fas fa-download me-2"></i> resume
              </a>
            </td>
          </tr>
        @endforeach


      </tbody>
    </table>
  </div>
</div>


</body>
@endsection
