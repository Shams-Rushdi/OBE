@extends('include_sa.master')
@section("content")

<div class="container py-9">
  <div class="row">

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
      <div class="card">
        <div class="card-body p-3">
          <a href="{{route('job.jobindexpage')}}">

          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold ">Jobs</p>
                <h5 class="font-weight-bolder mb-0 ">
                  {{$jobs_all}}
                  <span class="text-danger text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>
    </div>
    
     <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <a href="{{route('course.courseindexpage')}}">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold ">Online Courses</p>
                <h5 class="font-weight-bolder mb-0 ">
                  {{$course_all}}
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <a href="{{route('workshop.workshopindexpage')}}">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold ">Workshop</p>
                <h5 class="font-weight-bolder mb-0 ">
                  {{$workshops_all}}
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <a href="{{route('event.eventindexpage')}}">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold ">Event</p>
                <h5 class="font-weight-bolder mb-0 ">
                  {{$events_all}}
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>
    </div>


  </div>
  <div class="col-lg-12 mt-4">
    <div class="card mb-4">
        <div class="d-flex card-header pb-0 p-3">
          <h5 class="mb-1">Jobs</h5>
          <a  class="" href="{{route('job.jobindexpage')}}" style="float:right; margin-left:auto">View All</a>
        </div>
      <div class="card-body p-3">
        <div class="row">
          @foreach ($jobs as $job)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="{{$job->image ?  asset('uploads/'.$job->image) : asset('images/jobs/default-job-logo.jpg')}}" style="height:250px; width:400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  <a href="javascript:;">
                    <h6>
                      {{ Illuminate\Support\Str::limit($job->job_title, 26) }}

                    </h6>
                  </a>

                  <p class="mb-2 text-sm">
                   Company : {{ $job->company_name }}
                  </p>
                  <p class="mb-2 text-sm">
                   Salaray : {{ $job->salary }}
                  </p>
                  <p class="mb-2 text-sm">
                   Deadline: {{ date('d-m-y', strtotime($job->Deadline)) }}
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
  
  
    <div class="col-lg-12 mt-4">
    <div class="card mb-4">
        <div class="d-flex card-header pb-0 p-3">
          <h5 class="mb-1">Course</h5>
          <a  class="" href="{{route('course.courseindexpage')}}" style="float:right; margin-left:auto">View All</a>
        </div>
      <div class="card-body p-3">
        <div class="row">
          @foreach ($courses as $course)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="{{$course->image ?  asset('uploads/'.$course->image) : asset('images/jobs/default-job-logo.jpg')}}" style="height:250px; width:400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  <a href="javascript:;">
                    <h6>
                      {{ Illuminate\Support\Str::limit($course->title, 59) }}

                    </h6>
                  </a>


                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('course.show',$course->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12 mt-4">
    <div class="card mb-4">
        <div class="d-flex card-header pb-0 p-3">
          <h5 class="mb-1">Workshops</h5>
          <a  class="" href="{{route('workshop.workshopindexpage')}}" style="float:right; margin-left:auto">View All</a>
        </div>
      <div class="card-body p-3">
        <div class="row">
          @foreach ($workshops as $workshop)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="{{$workshop->image ? asset('uploads/'.$workshop->image): asset('images/workshops/default-workshop-logo.jpg')}}" style="height:250px; width:400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  <a href="javascript:;">
                    <h6>
                      {!! Illuminate\Support\Str::limit($workshop->title, 26) !!}

                    </h6>
                  </a>
                  <p class="mb-4 text-sm">
                    {!! Illuminate\Support\Str::limit($workshop->description, 30) !!}
                  </p>
                  <p class="mb-2 text-sm">
                   Workshop Location: {{ $workshop->location }}
                  </p>
                  <p class="mb-2 text-sm">
                   Start Date: {{ date('d-m-y', strtotime($workshop->start_date)) }}
                  </p>
                  <p class="mb-2 text-sm">
                   End Date: {{ date('d-m-y', strtotime($workshop->end_date)) }}
                  </p>
                  <p class="mb-2 text-sm">
                   Duration: {{ $workshop->duration }}
                  </p>
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('workshops.show',$workshop->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>


  <div class="col-lg-12 mt-4">
    <div class="card mb-4">
        <div class="d-flex card-header pb-0 p-3">
          <h5 class="mb-1">Events</h5>
          <a  class="" href="{{route('event.eventindexpage')}}" style="float:right; margin-left:auto">View All</a>
        </div>
      <div class="card-body p-3">
        <div class="row">
          @foreach ($events as $event)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="position-relative" >
                  <a class=" shadow-xl border-radius-xl">
                    <img src="{{$event->image ?  asset('uploads/'.$event->image) : asset('images/events/default-event-logo.jpg')}}" style="height:250px; width:400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  <a href="javascript:;">
                    <h6>
                      {{ Illuminate\Support\Str::limit($event->title, 26) }}
                    </h6>
                  </a>
                  <p class="mb-4 text-sm">
                    {!! Illuminate\Support\Str::limit($event->description, 30) !!}
                  </p>
                  <p class="mb-2 text-sm">
                   Start Date: {{ date('d-m-y', strtotime($event->start_date)) }}
                  </p>
                  <p class="mb-2 text-sm">
                   End Date:  {{ date('d-m-y', strtotime($event->end_date)) }}
                  </p>
                  <p class="mb-2 text-sm">
                   Start Time: {{ $event->start_time }}
                  </p>
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('event.show',$event->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>


  <div class="col-lg-12 mt-4">
    <div class="card mb-4">
        <div class="d-flex card-header pb-0 p-3">
          <h5 class="mb-1">Blogs</h5>
          <a  class="" href="{{route('blog.blogindexpage')}}" style="float:right; margin-left:auto">View All</a>

        </div>
      <div class="card-body p-3">
        <div class="row">
          @foreach ($blogs as $blog)
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
              <div class="card card-blog card-plain">
                <div class="position-relative">
                  <a class="d-block shadow-xl border-radius-xl">
                    <img src="{{$blog->image ?  asset('uploads/'.$blog->image) : asset('images/blogs/default-blog-logo.jpg')}}" style="height: 250px;width: 400px;"  alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                  </a>
                </div>
                <div class="card-body px-1 pb-0">
                  <p class="text-gradient text-dark mb-2 text-sm">{{$blog->blogsCategory->name}}</p>
                  <a href="javascript:;">
                    <h6>
                      {!! Illuminate\Support\Str::limit($blog->title, 26) !!}
                    </h6>
                  </a>
                  <p class="mb-4 text-sm">
                    {!! Illuminate\Support\Str::limit($blog->content, 30) !!}
                  </p>
                  <div class="d-flex align-items-center justify-content-between">
                    <a href="{{route('blog.show',$blog->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
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
