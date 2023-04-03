<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image: url('{{asset('registration_image/'.$site_setting[0]->registration_image)}}');
      background-repeat: no-repeat;
      background-size: cover;
    }

    .card {
      opacity: 0.8;
      padding: 45px;
      margin: 25px;
      border-radius: 14px;
      background-color: #fff;
      box-shadow: 0 0 13px rgba(0, 0, 0, 0.3);
    }

    .card-title {
      font-weight: bold;
      color: #333;
    }

    .form-control {
      border-radius: 5px;
      opacity: 1;
    }

    .btn-primary {
      border-radius: 5px;
      background-color: #3b5998;
      border-color: #3b5998;
    }

    .btn-primary:hover {
      background-color: #2d4373;
      border-color: #2d4373;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Registration</h3>
            <form action="{{ route('register') }}" method="post"  enctype="form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email"  name="email" placeholder="Enter email" required>
                    </div>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Student ID</label>
                      <input type="text" name="student_id" placeholder="Student ID" class="form-control"/>
                    </div>
                    @error('student_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                    <div class="form-group col-md-6">
                      <label for="email">Phone Number</label>
                      <input type="text" name="phone_number" placeholder="Phone Number" class="form-control"/>
                    </div>
                    @error('phone_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Gender</label>
                      <div>
                        <input type="radio" name="gender" class=""/>&nbsp; &nbsp; Male &nbsp;
                        <input type="radio" name="gender" class=""/>&nbsp; &nbsp; Female
                      </div>
                      @error('gender')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Passing Year</label>
                      <input type="number" name="passing_year" placeholder="Passing Year" class="form-control"/>
                    </div>
                    @error('passing_year')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Department</label>
                    <div>
                      <select class="custom-select" name="department_id">
                          <option selected="selected">Select Department</option>
                          @foreach($department as $key => $value)
                            <option value="{{$key}}">{{ $value }}</option>
                          @endforeach
                      </select>
                      @error('department_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Batch</label>
                    <div>
                      <input type="text" name="batch_id" placeholder="Batch" class="form-control"/>
                    </div>
                    @error('batch_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Membership</label>
                    <div>
                      <select class="custom-select" name="membership_id">
                          <option selected="selected">Select Membership</option>
                          @foreach($plan as $key => $value)
                            <option value="{{$key}}">{{ $value }}</option>
                          @endforeach
                      </select>
                      @error('membership_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Profession</label>
                    <div>
                      <input type="text" name="designation_letter" placeholder="Profession" class="form-control"/>
                    </div>
                    @error('designation_letter')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>



                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <div class="form-group col-md-6">
                    <label for="password">Confirm Password</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Enter password" required>
                  </div>
                  @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group row mb-4">
                  <div class="col-md-12 col-sm-12">
                      <input type="submit" name="btn" value="Sign Up" class="form-control btn btn-success"/>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
