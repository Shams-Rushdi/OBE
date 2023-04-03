<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"/>
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <title>Login Page</title>
  </head>
  <body class="d-flex vw-100 vh-100 align-items-center justify-content-center">
  <div class="container-fluid" style="background: url('assets/img/campus.jpg') no-repeat; background-size: cover;">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-8 m-auto">
                <div id="section-content" style="padding: 50px 0px;">
                    <div class="card" style="border-radius: 15px; opacity: .7;">
                        <div class="card-body" style="padding-left: 30px;">
                            <div>
                                <h3 class="text-center mb-3">Reset Password Page</h3>
                            </div>
                            <div class="login-form">
                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group mb-3">
                                        <label for="" class="col-md-4 col-sm-4 col-form-label">User Email</label>
                                        <div class="col-md-11 col-sm-11">
                                            <input type="text" name="email" placeholder="User Email" class="form-control"/>
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="col-md-4 col-sm-4 col-form-label">Password</label>
                                        <div class="col-md-11 col-sm-11">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="" class="col-md-4 col-sm-4 col-form-label">Confirm Password</label>
                                        <div class="col-md-11 col-sm-11">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="col-md-11 col-sm-11">
                                            <input type="submit" name="btn" value="Submit" class="form-control btn btn-outline-primary"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <a href="{{route('login')}}" class="col-md-11 col-sm-11 text-center">Back To Login</a>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-11 col-sm-11 mt-3 mb-4 text-center">Developed & Maintained By AmaComSoft</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
