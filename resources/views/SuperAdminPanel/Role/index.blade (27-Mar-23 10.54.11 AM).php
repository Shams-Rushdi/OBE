@extends('include.master')
@section('content')
@section('index','Role')
@section('title','Role')
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">

                    <!-- Hoverable Rows Table end -->
                    <!-- Progress Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('msg'))
                                    <p class="alert-alert-success">{{Session::get('msg')}}</p>
                                @endif
                            <a type="button" href="{{route('role.create')}}" class="btn btn-primary btn-lg float-end m-3" style="float: right;
  text-align: right;"> <i class="fa fa-plus"></i> Add Role</a>
                            <br>
                                <h4 class="header-title">Role</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                        {{@csrf_field()}}
                                            <thead class="text-uppercase">
                                                <tr>

                                                    <th scope="col">SL</th>
                                                    <th scope="col">Name </th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($role as $role)
                                                <tr>
                                                    <td >{{$loop->iteration}}</td>
                                                    <td >{{$role->name}}</td>
                                                    <td>
                                                        <form action="{{route('role.destroy',$role->id)}}"  method="Post">
                                                        <a href="{{route('role.edit',$role->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        @endsection
