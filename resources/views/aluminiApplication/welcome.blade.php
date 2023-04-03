@extends('include.master')
@section('content')
@section('index','Apply For Alumini Membership')
@section('title','Alumini')

    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 mx-auto text-center">
          <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
          <h1 class="mb-4">Congratulations!</h1>
          <p class="lead">Your application to join our alumni network has been successful. We're excited to welcome you to our community of graduates.</p>
          <a href="{{route('home')}}" class="btn btn-primary btn-lg mt-4">Continue to Our Website</a>
        </div>
      </div>
    </div>

@endsection
