@extends('include.master')
@section('content')
@section('title','Permissions')


                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                        <form class="form-valide" action="{{route('permission.update',$permission->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                            <h4 class="header-title">Permission</h4>
                            <input type="hidden" name="id" placeholder="id" value="{{ $permission->id }}">
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Permission Name</label>
                                <input class="form-control" type="text" name="name"value="{{old('name',$permission->name)}}" id="example-text-input">

                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                        <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>


        </div>
        <!-- main content area end -->
        @endsection
