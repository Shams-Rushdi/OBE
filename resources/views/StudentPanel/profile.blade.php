@extends('include_sa.master')
@section("content")

<div class="container">
  <div class="page-header min-height-300 border-radius-xl mt-9" style="background-image: url('{{$students->cover_image ? asset('images/profile/'.$students->cover_image):asset('frontend_sa/img/curved-images/curved0.jpg')}}'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-0"></span>
  </div>
  <div class="card card-body blur shadow-blur mx-7 ml-6 mt-n6 overflow-hidden">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="{{$students->profile_image ? asset('images/profile/'.$students->profile_image):asset('images/profile/profile.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto">
        <div class="h-100">
          <h5 class="mb-1">
            {{$students->name}}
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            {{$roleName = $students->getRoleNames()->first();}}
          </p>
          <p class="mb-0 font-weight-bold text-sm">
            {{$students->student_id}}
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
          <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
            <li class="nav-item">
            </li>
            <li class="nav-item">
            </li>


            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1 " href="{{route('chat')}}" target="_blank" >
                <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>settings</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(154.000000, 300.000000)">
                          <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                          <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                          </path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
                <span class="ms-1">Messages</span>
              </a>
            </li>


          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container py-4">
  <div class="row">
    <div class="col-12 col-xl-8">
      <div class="card h-100">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="col-md-4 text-end">
              <a data-bs-toggle="modal" data-bs-target="#exampleModalMessage" >
                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" style="cursor: pointer;"></i>
              </a>
              <div class="col-md-4">
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body" style="text-align: left">
                        <form role="form text-left"  action="{{route('student.profile.submit',$students->id)}}" method="post" enctype="multipart/form-data">
                          {{@csrf_field()}}
                          @method('PUT')
                          <input type="hidden" name="id" placeholder="id" value="{{ $students->id }}">
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{$students->name}}" id="recipient-name">
                          </div>
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="phone_number" value="{{$students->phone_number}}" id="recipient-name">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Present Address:</label>
                            <input class="form-control" name="present_address" value="{{$students->present_address}}" id="message-text"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Parmanent Address:</label>
                            <input class="form-control" name="permanent_address" value="{{$students->permanent_address}}" id="message-text"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob" value="{{$students->dob}}"  id="message-text">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Bio:</label>
                            <textarea class="form-control editor" type="text" name="bio" id="message-text">{!!$students->bio!!}</textarea>
                          </div>
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">Facebook:</label>
                            <input type="text" class="form-control" name="facebook" placeholder="https://www.facebook.com/" value="{{$students->facebook}}" id="recipient-name">
                          </div>
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">LinkedIn:</label>
                            <input type="text" class="form-control" name="linkedin" placeholder="https://www.linkedin.com/" value="{{$students->linkedin}}" id="recipient-name">
                          </div>
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">Twitter:</label>
                            <input type="text" class="form-control" name="twitter" placeholder="https://twitter.com/" value="{{$students->twitter}}" id="recipient-name">
                          </div>
                          <div class="form-group" >
                            <label for="recipient-name" class="col-form-label">Instagram:</label>
                            <input type="text" class="form-control" name="instagram" placeholder="https://www.instagram.com/" value="{{$students->instagram}}" id="recipient-name">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Profile Picture:</label>
                            <input class="form-control" type="file" value="{{$students->profile_image}}" name="profile_image" id="example-text-input">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Cover Picture:</label>
                            <input class="form-control" type="file" value="{{$students->cover_image}}" name="cover_image" id="example-text-input">
                          </div>
                          <button  class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn bg-gradient-primary">Update</button>
                        </form>
                      </div>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <p class="text-sm">
            {!!$students->bio!!}
          </p>
          <hr class="horizontal gray-light my-4">
          <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{$students->name}}</li>
            @if (isset($students->department->name))
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Department:</strong> &nbsp; {{$students->department->name}}</li>
            @endif
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{$students->phone_number}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$students->email}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{$students->present_address}}</li>
            <li class="list-group-item border-0 ps-0 pb-0">
              <strong class="text-dark text-sm">Social:</strong> &nbsp;
              <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="{{$students->facebook}}">
                <i class="fab fa-facebook fa-lg"></i>
              </a>
              <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="{{$students->twitter}}">
                <i class="fab fa-twitter fa-lg"></i>
              </a>
              <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="{{$students->instagram}}">
                <i class="fab fa-instagram fa-lg"></i>
              </a>
              <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" target="_blank" href="{{$students->linkedin}}">
                <i class="fab fa-linkedin fa-lg"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '.editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
