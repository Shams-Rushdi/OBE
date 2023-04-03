@extends('include.master')
@section('content')
@section('title','Roles-Permission')

            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                    <form class="form-valide" action="{{route('role-permission.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                        <h4 class="header-title">Role and Permission</h4>

                        <div class="form-group">
                            <label class="col-form-label">Role Name</label>
                            <select class="custom-select" name="name">
                                <option selected="selected">Select Role</option>
                                    @foreach($role as $key => $value)
                                    <option value="{{$key}}">{{ $value }}</option>
                                    @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="example-datetime-local-input" class="col-form-label">Permissions</label><br><br>
                            @foreach($permissions as $key => $value)
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="{{$value}}" for="{{$value}}" name="permission[]" value="{{$value}}">
                                <label class="custom-control-label" for="{{$value}}">{{ $value }}</label>
                            </div>
                            @endforeach
                        </div>
                            <br>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- main content area end -->
        @endsection
