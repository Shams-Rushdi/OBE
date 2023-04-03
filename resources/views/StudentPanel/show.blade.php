@extends('include.master')
@section('content')
@section('title','Student Details')

<style>
.avatar {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 20px;
}

.btn-messenger {
  background-color: #00B2FF;
  color: #fff;
}

.btn-messenger:hover {
  background-color: #008CFF;
  color: #fff;
}

</style>

<div class="container mt-3 ">
  <div class="row">
    <div class="col-md-3">
      <div class="d-flex flex-column align-items-center">
        <img class="avatar img-fluid" src="{{$student->profile_image ? asset('images/profile/'.$student->profile_image):asset('images/profile/profile.jpg')}}" alt="Profile Picture">
        <div class="mt-3 d-grid gap-2">
          <button class="btn btn-messenger"><i class="fab fa-facebook-messenger"></i> Message</button>
          <button class="btn btn-primary" onclick=""><i class="fas fa-print"></i> Print</button>

        </div>
      </div>
    </div>
    <div class="col-md-9">
      <h1>{{$student->name}}</h1>
      <p><i class="fas fa-envelope"></i> {{$student->email}}</p>
      <p><i class="fas fa-phone"></i> {{$student->phone_number}}</p>
      <hr>
      <div class="row">
        <div class="col-md-4">
          <div class="my-3">
            <h5 class="font-weight-bold"><strong>Status</strong></h5>
            <p>{{$student->status == "0" ? "In Active" : "Active" }}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Gender</strong></h5>
            <p>{{$student->gender}}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Batch ID</strong></h5>
            <p>{{$student->batch_id}}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Student ID</strong> </h5>
            <p>{{$student->student_id}}</p>
          </div>
          <div class="my-3">
            @if (isset($student->department->name))
              <h5> <strong> Department Name </strong></h5>
              <p>{{$student->department->name }}</p>
            @endif
          </div>
        </div>
        <div class="col-md-4">
          <div class="my-3">
            <h5> <strong> Present Address </strong></h5>
            <p>{{$student->present_address}}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Permanent Address</strong> </h5>
            <p>{{$student->permanent_address}}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Company Name</strong> </h5>
            <p>{{$student->company_name}}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Designation Letter</strong> </h5>
            <p>{{$student->designation_letter}}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Experience</strong> </h5>
            <p>{{$student->experience}}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="my-3">
            <h5> <strong>Date of Birth</strong> </h5>
            <p>{{$student->dob}}</p>
          </div>
          <div class="my-3">
            <h5> <strong>Alumni ID</strong> </h5>
            <p>{{$student->alumni_id}}</p>
          </div>
          <div class="my-3">
            <h5><strong>Passing Year</strong></h5>
            <p>{{$student->passing_year}}</p>
          </div>
          <div class="my-3">
            <h5><strong>Bio</strong></h5>
            <p>{!!$student->bio!!}</p>
          </div>
          <div class="my-3">
            <h5><strong>Active Status</strong></h5>
            <p>{{$student->active_status ? "Active" : "In Active"}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection
