@extends('include.master')
@section('content')
@section('index','Already Applied')
@section('title','Alumini')

    <div class="container my-5">
      <div class="row">
        <div class="col-md-8 mx-auto text-center">
          <i class="fas fa-info-circle fa-5x text-info mb-4"></i>
          <h1 class="mb-4">You've Already Applied</h1>
          <p class="lead">It looks like you've already applied to join our alumni network. We're currently processing your application, and we'll get back to you as soon as possible. Thank you for your interest!</p>
          <a href="{{route('home')}}" class="btn btn-primary btn-lg mt-4">Return to Home</a>
        </div>
      </div>
    </div>

@endsection
