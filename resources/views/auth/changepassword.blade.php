@extends('include.master')
@section('content')
@section('index','Change Password')
@section('title','Password')
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('user.pass.submit')}}" method="post" enctype="multipart/form-data">
                                    {{@csrf_field()}}
                                                  
                                        @method('POST')
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @elseif (session('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                
                                        <h4 class="header-title">Change Password</h4>
                                        <input type="hidden" name="id" placeholder="id" value="{{ $user->id }}">
                                        <input class="form-control" type="hidden" name="email"value="{{$user->email }}" id="example-text-input">
                                        <input class="form-control" type="hidden" name="role" value="{{$user->role }}" id="example-text-input">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Current Password</label>
                                            <input class="form-control" type="password" name="old_password"value="" id="example-text-input">
                                            @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">New Password</label>
                                            <input class="form-control" type="password" name="password"value="" id="example-text-input">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Confirm New Password</label>
                                            <input class="form-control" type="password" name="confirm_password"value="" id="example-text-input">
                                            @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
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