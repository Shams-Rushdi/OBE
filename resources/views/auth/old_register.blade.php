<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('registration')}}/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('registration')}}/css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{asset('registration')}}/images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form"  enctype="form-data">
                        @csrf
                        <h2>student registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input type="text" name="name" id="name" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="father_name">Student Id :</label>
                                <input type="text" name="student_id" id="phone_number" />
                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" />
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Password :</label>
                            <input type="password" name="password" id="address" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Confirm Password :</label>
                            <input type="password" name="password_confirmation" id="address" />
                        </div>

                        <div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
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

                        <div class="form-group" >
                            <label for="passing_year"> Passing Year :</label>
                            <input type="text" name="passing_year" id="passing_year">
                            @error('passing_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                                                    
                        <div class="form-group">
                            <label class="col-form-label">Department</label>
                            <select class="custom-select" name="department_id">
                                <option selected="selected">Select Department</option>
                                    @foreach($department as $key => $value)
                                    <option value="{{$key}}">{{ $value }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="birth_date">Batch No :</label>
                            <input type="text" name="batch_id" id="batch_id">
                            @error('batch_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        

                        <div class="form-group">
                            <label for="pincode">Present Address :</label>
                            <input type="text" name="present_address" id="present_address">
                            @error('present_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pincode">Phone Number :</label>
                            <input type="text" name="phone_number" id="phone_number">
                            @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{asset('registration')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('registration')}}/js/main.js"></script>
    <script>
    function show1(){
        document.getElementById('div1').style.display ='none';
      }
      function show2(){
        document.getElementById('div1').style.display = 'block';
      }
      </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>