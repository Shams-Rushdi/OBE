@extends('include.master')
@section('content')
@section('index','Jobs')
@section('title','Job Listings')

<style>

.card{
	display: block;
	padding: 3vh 2vh 7vh 5vh;
	border: none;
	border-radius: 15px;
	margin-top: 5%;
	margin-bottom: 5%;
	max-width: 500px;
}
.header{
	margin-bottom: 5vh;
	margin-right: 2vh;
	float: right;
	margin-left: auto;
}

.far{
	color: rgba(15, 198, 239, 0.97)!important;
	font-size: 16px!important;
}
p.heading{
	font-weight: bold;
	font-size: 25px;
}
p.text-muted{
	font-size: 17px;
	font-weight: bold;
	color: #a1a7ae!important;
}
.btn-sm{
	border-radius: 8px;
}
.fas.fa-users{
	color: rgba(15, 198, 239, 0.97)!important;
}
.mutual span{
	font-size: 14px;
	color: #adb5bd;
	font-weight: bold;
}
.btn-primary.btn-lg{
    border-radius: 30px;
    width: 90%;
    border: none;
    background: #8c02e3;
}
.btn-dark.btn-lg{
    border-radius: 30px;
    width: 90%;
    border: none;
    background: #dee2e6;
}
.btn-dark span{
	font-size: 14px;
	text-align: center;
	color: #0000008c;
	font-weight: bold;
}
.btn-primary span{
	font-size: 14px;
	text-align: center;
	color: #fff;
	font-weight: bold;
}
</style>
<!-- page title area end -->
<div class="row">
  @foreach ($jobs as $item)
  <div class="col-10 main-content-inner">
    <div class="container">
      <div class="card mx-auto">
        <div class="row">
          <div class="pr-3"><img src="{{asset('uploads/'.$item->image)}}"></div>
          <div class="header right"><i class="fas fa-ellipsis-h"></i></div>
        </div>
          <div class="card-title">
            <p class="heading">{{$item->job_title}}</p>
          </div>

          <p class="text-muted">{{$item->description}}</p>

          <div class="row btnrow my-4">
            <div class="col-4 col-md-4 mr-4"><button type="button" class="btn btn-outline-success btn-sm" style="background: #00ff002b;"><i class="ti-location-pin"></i>{{$item->job_location}}</button></div>
            <div class="col-4 col-md-4"><button type="button" class="btn btn-outline-primary btn-sm" style="background: #007bff33;"><a href="mailto:{{$item->contact_email}}"><i class="ti-email"></i> Send Mail</a></button></div>
          </div>
          <div class="row btnrow ">
            <div class="col-4 col-md-4"><button type="button" class="btn btn-outline-danger btn-sm" style="background: #dc35452e;"><i class="ti-mobile"></i> {{$item->phone}}</button></div>
          </div>


          <div class="row btnrow my-4">
            <div class="col-6 col-md-3"><button type="button" class="btn btn-outline-danger btn-sm text-dark" style="background: #42cd43;"><i class="ti-calendar"></i> Deadline: {{$item->deadline}}</button></div>

            <div class="col-6 col-md-3" style="margin-left: 5em"><button type="button" class="btn btn-outline-danger btn-sm text-white" style="background: #05258a;"><i class="fa fa-money"></i> Salary: {{$item->salary}}</button></div>
          </div>



          <div class="row btnsubmit mt-4">
            <div class="col-md-6 col-6">
              <a href="{{route('jobapplications.edit',$item->id)}}" type="button" class="btn btn-primary btn-lg"><span>Apply Now</span></a>
            </div>

          </div>
      </div>
    </div>
  </div>
    @endforeach
</div>

        <!-- main content area end -->
@endsection
