@extends('include.master')
@section('content')
@section('index','Role & Permissions')
@section('title','Role & Permission')
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
                                                        <form action="{{route('role-permission.destroy',$role->id)}}"  method="Post">
                                                        <a href="{{route('role-permission.edit',$role->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
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
