@extends('include.master')
@section('content')
@section('index','Profile Student')
@section('title','Profile')
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('student.update',$student->id)}}" method="post" enctype="multipart/form-data">
                                    {{@csrf_field()}}

                                        @method('PUT')

                                        <h4 class="header-title">Edit Student Details</h4>
                                        <input type="hidden" name="id" placeholder="id" value="{{ $student->id }}">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Name</label>
                                            <input class="form-control" type="text" name="name"value="{{$student->name}}" id="example-text-input">
                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone_number"value="{{$student->phone_number }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Present Address</label>
                                            <input class="form-control" type="text" name="present_address"value="{{$student->present_address }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Permanent Address</label>
                                            <input class="form-control" type="text" name="permanent_address"value="{{$student->permanent_address }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Dob</label>
                                            <input class="form-control" type="date" name="dob"value="{{$student->dob }}" id="example-text-input">
                                        </div>

                                      <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


        </div>
        <!-- main content area end -->
        @endsection
