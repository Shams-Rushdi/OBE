@extends('include.master')
@section('content')
@section('title','Permissions')

                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                    <form class="form-valide" action="{{route('permission.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                        <h4 class="header-title">Permission</h4><br><br>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Permission Name</label>
                                            <input class="form-control" type="text" name="name"value="{{old('name')}}" id="example-text-input">

                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                            <br><br><br>
                                      <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


        </div>
        <!-- main content area end -->
        @endsection
