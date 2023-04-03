@extends('include.master')
@section('content')
@section('title','Alumni')


                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('alumni.update',$alumni->id)}}" method="post" enctype="multipart/form-data">
                                    {{@csrf_field()}}

                                        @method('PUT')

                                        <h4 class="header-title">Edit Alumni Details</h4>
                                        <input type="hidden" name="id" placeholder="id" value="{{ $alumni->id }}">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Student Id</label>
                                            <input class="form-control" type="text" name="student_id"value="{{$alumni->student_id }}" id="example-text-input" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Name</label>
                                            <input class="form-control" type="text" name="name"value="{{$alumni->name}}" id="example-text-input">
                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <label class="col-form-label">Select Department</label>
                                        <select name="department_id" class="form-control py-2">
                                            @foreach ($department as $department)
                                                <option value="{{$department->id}}" {{$department->id == $alumni->department_id ? 'selected': ''}}>{{$department->name}}</option>
                                            @endforeach
                                        </select>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Email</label>
                                            <input class="form-control" type="email" name="email"value="{{$alumni->email }}" id="example-text-input">
                                            @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Dob</label>
                                            <input class="form-control" type="date" name="dob"value="{{$alumni->dob }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone_number"value="{{$alumni->phone_number }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Present Address</label>
                                            <input class="form-control" type="text" name="present_address"value="{{$alumni->present_address }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Permanent Address</label>
                                            <input class="form-control" type="text" name="permanent_address"value="{{$alumni->permanent_address }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Company Name</label>
                                            <input class="form-control" type="text" name="company_name"value="{{$alumni->company_name }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Designation</label>
                                            <input class="form-control" type="text" name="designation_letter"value="{{$alumni->designation_letter }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Experience</label>
                                            <input class="form-control" type="text" name="experience"value="{{$alumni->experience }}" id="example-text-input">
                                        </div>

                                      <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


        </div>
        <!-- main content area end -->
        @endsection
