@extends('include.master')
@section('content')
@section('title','Alumni')


                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('alumni.store')}}" method="post" enctype="multipart/form-data">
                                    {{@csrf_field()}}

                                        <h4 class="header-title">Add Alumni</h4><br><br>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Student Id</label>
                                            <input class="form-control" type="text" name="student_id"value="" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Batch No</label>
                                            <input class="form-control" type="text" name="batch_id"value="" id="example-text-input">
                                        </div>

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
                                            <label class="col-form-label">Department</label>
                                            <select class="form-control form-select" name="department_id">
                                                <option selected="selected">Select Department</option>
                                                    @foreach($department as $key => $value)
                                                    <option value="{{$key}}">{{ $value }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class="form-radio">
                                            <label for="gender" class="radio-label">Gender</label>
                                            <div class="form-radio-item">
                                                <input type="radio" value="Male" name="gender" id="male" checked>
                                                <label for="male">Male</label>
                                                <span class="check"></span>
                                            </div>
                                            <div class="form-radio-item">
                                                <input type="radio" value="Female" name="gender" id="female">
                                                <label for="female">Female</label>
                                                <span class="check"></span>
                                            </div>
                                            @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Present Address</label>
                                            <input class="form-control" type="text" name="present_address"value="" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Permanent Address</label>
                                            <input class="form-control" type="text" name="permanent_address"value="" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Company Name</label>
                                            <input class="form-control" type="text" name="company_name"value="" id="example-text-input">
                                        </div>


                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Designation Letter</label>
                                            <input class="form-control" type="text" name="designation_letter"value="" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Experience</label>
                                            <input class="form-control" type="text" name="experience"value="" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="dob"value="" id="example-text-input">
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
