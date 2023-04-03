@extends('include_sa.master')
@section("content")
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<style>
.custom-hr {
  border-top: 2px solid #ccc;
  width: 100%;
  margin-left: 0;
  margin-right: 0;
}
</style>

<div class="container col-md-12 col-sm-10 mt-10">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between pb-0 p-3">
      <h5 class="mb-1">Courses</h5>
      <div class="container">
        <hr class="my-4 custom-hr">
      </div>
      <div class="dropdown">
        <a href="javascript:;" class="btn bg-gradient-dark  dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
          Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
          <li>
            <a class="dropdown-item" href="{{route('course.courseindexpage')}}">
              All
            </a>
          </li>
            @foreach ($course_categories as $item)              
            <li>
                <a class="dropdown-item" href="{{route('coursecategory.show',$item->id)}}">
                  {{$item->name}}
                </a>
            </li>
            @endforeach
        </ul>
      </div>
    </div>
    <div class="card-body p-3">
      <div class="row">
      @foreach ($courses as $course)
        <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
          <div class="card card-job card-plain">
            <div class="position-relative">
              <a class="d-block shadow-xl border-radius-xl">
                <img src="{{$course->image ?  asset('uploads/'.$course->image) : asset('images/course/default-course-image.jpg')}}" style="height: 250px;width: 400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
              </a>
            </div>
            <div class="card-body px-1 pb-0">
              <p class="text-gradient text-dark mb-2 text-sm"></p>

                <p class="mb-2 text-sm">
                  <b> {{$course->title}} </b>
                </p>
     
  
                <p class="mb-2 text-sm">
                Published: {{ date('d-m-y', strtotime($course->created_at)) }}
                </p>

              <p class="mb-4 text-sm">

              </p>
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



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection