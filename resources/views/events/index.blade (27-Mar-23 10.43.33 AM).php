@extends('include.master')
@section('content')
@section('index','Events')
@section('title','Events List')
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
                            <a type="button" href="{{route('events.create')}}" class="btn btn-primary btn-lg float-right m-3"> <i class="fa fa-plus"></i> Add Events</a>
                            <br>
                                <h4 class="header-title">Events</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                        {{@csrf_field()}}
                                            <thead class="text-uppercase">
                                                <tr>

                                                    <th scope="col">SL</th>
                                                    <th scope="col">Title </th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">End Date</th>
                                                    <th scope="col">Start Time</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($events as $item)
                                                <tr>
                                                    <td >{{$loop->iteration}}</td>
                                                    <td >{{$item->title}}</td>
                                                    <td ><img style="width:150px; height:100px;" src="{{ asset('uploads/'.$item->image)}}" alt=""></td>
                                                    
                                                    <td >{{$item->start_date}}</td>
                                                    <td >{{$item->end_date}}</td>
                                                    <td >{{$item->start_time}}</td>
                                                    <td >{{$item->type}}</td>
                                                    <td>
                                                        <form action="{{route('events.destroy',$item->id)}}"  method="Post">
                                                        <a href="{{route('events.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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
