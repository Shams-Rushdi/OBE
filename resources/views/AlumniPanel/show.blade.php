@extends('include.master')
@section('content')
@section('title','Alumni Details')

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


<div class="container mt-5">
  <div class="row">
    <div class="col-md-3">
      <div class="d-flex flex-column align-items-center">
        <img class="avatar img-fluid" src="{{$alumni->profile_image ? asset('images/profile/'.$alumni->profile_image):asset('images/profile/profile.jpg')}}" alt="Profile Picture">
        <div class="mt-3 d-grid gap-2">
          <button class="btn btn-messenger"><i class="fab fa-facebook-messenger"></i> Message</button>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <h1>{{$alumni->name}}</h1>
      <p><i class="fas fa-envelope"></i> {{$alumni->email}}</p>
      <p><i class="fas fa-phone"></i> {{$alumni->phone_number}}</p>
      <hr>
      <div class="row">
        <div class="col-md-4">
          <h5>Status</h5>
          <p>{{$alumni->status == "0" ? "In Active" : "Active" }}</p>
          <h5>Gender</h5>
          <p>{{$alumni->gender}}</p>
          <h5>Batch ID</h5>
          <p>{{$alumni->batch_id}}</p>
          <h5>Student ID</h5>
          <p>{{$alumni->student_id}}</p>
          <h5>Department Name</h5>
          <p>{{$alumni->department->name ?? ' '}}</p>
        </div>
        <div class="col-md-4">
          <h5>Present Address</h5>
          <p>{{$alumni->present_address}}</p>
          <h5>Permanent Address</h5>
          <p>{{$alumni->permanent_address}}</p>
          <h5>Company Name</h5>
          <p>{{$alumni->company_name}}</p>
          <h5>Designation Letter</h5>
          <p>{{$alumni->designation_letter}}</p>
          <h5>Experience</h5>
          <p>{{$alumni->experience}}</p>
        </div>
        <div class="col-md-4">
          <h5>Date of Birth</h5>
          <p>{{$alumni->dob}}</p>
          <h5>Student ID</h5>
          <p>{{$alumni->student_id}}</p>
          <h5>Passing Year</h5>
          <p>{{$alumni->passing_year}}</p>
          <h5>Bio</h5>
          <p>{{$alumni->bio}}</p>
          <h5>Active Status</h5>
          <p>{{$alumni->active_status ? "Active" : "In Active"}}</p>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
