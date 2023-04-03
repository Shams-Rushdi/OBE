@extends('include_sa.master')
@section("content")


<div class="container col-md-12 col-sm-10 mt-10">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between pb-0 p-3">
      <h5 class="mb-1">Jobs</h5>
      <div class="dropdown">
        <a href="javascript:;" class="btn bg-gradient-dark  dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
          Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
            <li>
              <a class="dropdown-item" href="{{route('job.jobindexpage')}}">
                All
              </a>
            </li>
            @foreach ($job_categories as $item)              
            <li>
                <a class="dropdown-item" href="{{route('jobcategories.show',$item->id)}}">
                  {{$item->name}}
                </a>
            </li>
            @endforeach
        </ul>
      </div>
    </div>
    <div class="card-body p-3">
      <div class="row">
      @foreach ($job_category->jobs as $job)
        <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
          <div class="card card-job card-plain">
            <div class="position-relative">
              <a class="d-block shadow-xl border-radius-xl">
                <img src="{{$job->image ?  asset('uploads/'.$job->image) : asset('images/jobs/default-job-logo.jpg')}}" style="height: 250px;width: 400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
              </a>
            </div>
            <div class="card-body px-1 pb-0">
              <p class="text-gradient text-dark mb-2 text-sm">{{$job->jobCategory->name}}</p>
              <a href="javascript:;">
                <h6>
                  {{$job->job_title}}
                </h6>
              </a>
              <p class="mb-4 text-sm">

              </p>
              <div class="d-flex align-items-center justify-content-between">
                <a href="{{route('jobs.show',$job->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
