@extends('include.master')
@section('content')
@section('index','Edit Profile')
@section('title','Profile')
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('user.profile.submit')}}" method="post" enctype="multipart/form-data">
                                    {{@csrf_field()}}
                                                  
                                        @method('POST')
                                
                                        <h4 class="header-title">Edit user Details</h4>
                                        <input type="hidden" name="id" placeholder="id" value="{{ $user->id }}">
                                        <input class="form-control" type="hidden" name="email"value="{{$user->email }}" id="example-text-input">
                                        

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Name</label>
                                            <input class="form-control" type="text" name="name"value="{{$user->name}}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Phone Number </label>
                                            <input class="form-control" type="text" name="phone_number"value="{{$user->phone_number }}" id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Present Address </label>
                                            <input class="form-control" type="text" name="present_address"value="{{$user->present_address }}" id="example-text-input">
                                        </div>


                                        <label for="example-text-input" class="col-form-label">Profile Image</label>
                                        <br>
                                        <img style="width:150px; height:100px;" src="{{ asset('images/profile/'.$user->profile_image)}}" alt="">
                                        <br>
                                        <div class="form-group">
                                        <input class="form-control" type="file" value="{{$user->profile_image}}" name="profile_image" id="example-text-input">
                                        @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        </div>
                                        <label for="example-text-input" class="col-form-label">Cover Image</label>
                                        <br>
                                        <img style="width:150px; height:100px;" src="{{ asset('images/profile/'.$user->cover_image)}}" alt="">
                                        <br>
                                        <input class="form-control" type="file" value="{{$user->cover_image}}" name="cover_image" id="example-text-input">
                                        @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                        
                                      <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
            

        </div>
        <!-- main content area end -->
        @endsection