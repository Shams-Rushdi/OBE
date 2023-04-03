@extends('include.master')
@section('content')
@section('title','Site Settings')


@if(count($basic) != 0)

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <div class="card-body">
                    <form method="POST" action="{{ route('basic.update')}}" enctype="multipart/form-data">
                        @csrf

                          <div class="row">
                            <div class=" col-md-6  mb-3">
                                <label for="logo" class="form-label">Site Name</label>
                                <input type="text" class="form-control" value="{{$b->site_name}}" id="site_name" name="site_name">
                            </div>

                            <div class=" col-md-6 mb-3">
                                <label for="icon" class="form-label">Slogan</label>
                                <input type="text" class="form-control" value="{{$b->slogan}}" id="slogan" name="slogan">
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-6  mb-3">
                                <label for="logo" class="form-label">Site Title</label>
                                <input type="text" class="form-control" value="{{$b->site_title}}" id="site_title" name="site_title">
                            </div>

                            <div class=" col-md-6 mb-3">
                                <label for="icon" class="form-label">Site Description</label>
                                <input type="text" class="form-control" value="{{$b->site_des}}" id="site_des" name="site_des">
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-6  mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                            </div>

                            <div class=" col-md-6 mb-3">
                                <label for="icon" class="form-label">Icon</label>
                                <input type="file" class="form-control" id="icon" name="icon">
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" value="{{$b->phone_number}}" name="phone_number">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone_number2" class="form-label">Phone Number 2</label>
                                <input type="text" class="form-control" id="phone_number2" value="{{$b->phone_number2}}" name="phone_number2">
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="{{$b->email}}" name="email">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email2" class="form-label">Email 2</label>
                                <input type="email" class="form-control" id="email2" value="{{$b->email2}}" name="email2">
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="team_des" class="form-label">Team Description</label>
                                <textarea class="form-control editor" id="team_des"  name="team_des">{{$b->team_des}}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="contact_des" class="form-label">Contact Description</label>
                                <textarea class="form-control editor" id="contact_des"  name="contact_des">{{$b->contact_des}}</textarea>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="service_des" class="form-label">Service Description</label>
                                <textarea class="form-control editor" id="service_des"  name="service_des">{{$b->service_des}}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" value="{{$b->facebook}}" name="facebook">
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" id="twitter" value="{{$b->twitter}}" name="twitter">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" value="{{$b->instagram}}" name="instagram">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="instagram" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" value="{{$b->linkedin}}" name="linkedin">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="site_image" class="form-label">Site Image</label>
                                <input type="file" class="form-control" id="site_image" name="site_image">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <img class="rounded" src="{{asset('profile/'.$b->profile)}}" alt="" height="250" width="300">
                                <label for="site_image" class="form-label">Company Profile</label>
                                <input type="file" class="form-control" id="profile" name="profile">
                            </div>

                            <div class="col-md-4 mb-3">
                                <img class="rounded" src="{{asset('login_image/'.$b->login_image)}}" alt="" height="250" width="300">
                                <label for="site_image" class="form-label">Login Image</label>
                                <input type="file" class="form-control" id="profile" name="login_image">
                            </div>

                            <div class="col-md-4 mb-3">
                                <img class="rounded" src="{{asset('registration_image/'.$b->registration_image)}}" alt="" height="250" width="300">
                                <label for="site_image" class="form-label">Registration Image</label>
                                <input type="file" class="form-control" id="profile" name="registration_image">
                            </div>

                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @else

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Basic Setting</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <p class="text-center text-success">{{Session::get('message')}}</p>
                <div class="card-body">

                    <form method="POST" action="{{ route('basic.store') }}"  enctype="multipart/form-data">
                        @csrf

                       <div class="row">
                            <div class=" col-md-6  mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control"  name="logo">
                            </div>

                            <div class=" col-md-6 mb-3">
                                <label for="icon" class="form-label">Icon</label>
                                <input type="file" class="form-control"  name="icon">
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-6  mb-3">
                                <label for="logo" class="form-label">Site Title</label>
                                <input type="text" class="form-control" id="site_title" name="site_name">
                            </div>

                            <div class=" col-md-6 mb-3">
                                <label for="icon" class="form-label">Site Description</label>
                                <input type="text" class="form-control" id="site_des" name="site_des">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="theme_color" class="form-label">Theme Color</label>
                                <input type="color" class="form-control" id="theme_color" name="theme_color">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>



                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone_number2" class="form-label">Phone Number 2</label>
                                <input type="text" class="form-control" id="phone_number2" name="phone_number2">
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email2" class="form-label">Email 2</label>
                                <input type="email" class="form-control" id="email2" name="email2">
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="team_des" class="form-label">Team Description</label>
                                <textarea class="form-control editor" id="team_des" name="team_des"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="contact_des" class="form-label">Contact Description</label>
                                <textarea class="form-control editor" id="contact_des" name="contact_des"></textarea>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="service_des" class="form-label">Service Description</label>
                                <textarea class="form-control " id="service_des" name="service_des"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook">
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="instagram" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="site_image" class="form-label">Site Image</label>
                                <input type="file" class="form-control" id="site_image" name="site_image">
                            </div>

                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endif

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    // Get all elements with the class name "editor"
    const editors = document.querySelectorAll('.editor');

    // Loop through each editor element
    for (let i = 0; i < editors.length; i++) {
    const editor = editors[i];

    // Create a text editor for the current editor element
    ClassicEditor
        .create(editor)
        .catch(error => {
        console.error(error);
        });
    }
</script>

@endsection
