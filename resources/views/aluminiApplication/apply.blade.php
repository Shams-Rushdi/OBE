@extends('include.master')
@section('content')
@section('index','Apply For Alumini Membership')
@section('title','Alumini')

<style>
  ul.list-unstyled li::before {
  content: "\2713";
  font-size: 1.5em;
  margin-right: 10px;
}

</style>

<div class="container my-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h1 class="text-center mb-4 py-3 bg-info text-light">Join Our Alumni Network!</h1>
      <div class="lead-section bg-light mb-5">
        <h2 class="mb-3">Connect with Other Graduates</h2>
        <p class="lead">Congratulations on graduating from our university! We're excited to invite you to become a member of our alumni network.</p>
      </div>
      <div class="benefits-section text-info mb-5">
        <h2 class="mb-3">Unlock Exclusive Benefits</h2>
        <ul class="list-unstyled">
          <li class="mb-3">Networking opportunities with other alumni</li>
          <li class="mb-3">Access to job listings and career resources</li>
          <li class="mb-3">Invitations to exclusive events and reunions</li>
          <li class="mb-3">Discounts on university merchandise and services</li>
        </ul>
      </div>
      <div class="apply-section bg-secondary text-center my-4">
        <a href="{{route('aluminiapplications.create')}}" class="btn btn-primary btn-lg px-5 py-3">Apply for Membership</a>
      </div>
    </div>
  </div>
</div>


@endsection
