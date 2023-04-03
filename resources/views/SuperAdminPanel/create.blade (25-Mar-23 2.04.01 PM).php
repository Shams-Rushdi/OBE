@extends('include.master')
@section('content')
@section('index','Create Super Admin')
@section('title','Super Admin')
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('superadmin.store')}}" method="post" enctype="multipart/form-data">
                                    {{@csrf_field()}}

                                        <h4 class="header-title">Add Super Admin</h4>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">User Name</label>
                                            <input class="form-control" type="text" name="name"value="" id="example-text-input">

                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Email</label>
                                            <input class="form-control" type="email" name="email"value="" id="example-text-input">
                                            @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone_number"value="" id="example-text-input">
                                        </div>


                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Password</label>
                                            <input class="form-control" type="text" name="password"value="" id="example-text-input">
                                            @error('password')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                      <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


        </div>
        <!-- main content area end -->
        @endsection
