@extends('include.master')
@section('content')
@section('title','teacher')


                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('teacher.update',$teacher->id)}}" method="post" enctype="multipart/form-data">
                                    {{@csrf_field()}}

                                        @method('PUT')

                                        <h4 class="header-title">Edit teacher Details</h4>
                                        <input type="hidden" name="id" placeholder="id" value="{{ $teacher->id }}">

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Name</label>
                                            <input class="form-control" type="text" name="name"value="{{$teacher->name}}" id="example-text-input">
                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Email</label>
                                            <input class="form-control" type="email" name="email"value="{{$teacher->email }}" id="example-text-input">
                                            @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Phone Number</label>
                                            <input class="form-control" type="text" name="phone_number"value="{{$teacher->phone_number }}" id="example-text-input">
                                        </div>
                                      <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


        </div>
        <!-- main content area end -->
        @endsection
