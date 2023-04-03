@extends('include.master')
@section('content')
@section('index','teacher Index')
@section('title','teacher')
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
                            <a type="button" href="{{route('teacher.create')}}" class="btn btn-primary btn-lg float-right m-3">+ Add teacher</a>
                            <br>
                                <h4 class="header-title">teacher Table</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                        {{@csrf_field()}}
                                            <thead class="text-uppercase">
                                                <tr>
                                                    
                                                    <th scope="col">teacher Name</th>
                                                    <th scope="col">Email </th>
                                                    <th scope="col">Phone Number</th>
                                                    <th scope="col">Status</th>

                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($teacher as $teacher)
                                                <tr>
                                                    <td >{{$teacher->name}}</td>
                                                    <td >{{$teacher->email}}</td>
                                                    <td >{{$teacher->phone_number}}</td>
                                                    <td><span class="badge bg-label-primary me-1">{{$teacher->status}}</span></td>
                                                <td>
                                                 <form action="{{route('teacher.destroy',$teacher->id)}}"  method="Post">
                                                    <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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