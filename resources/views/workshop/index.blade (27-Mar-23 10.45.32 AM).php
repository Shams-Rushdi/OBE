@extends('include.master')
@section('content')
@section('index','Workshops')
@section('title','Workshop Management')
            <!-- page title area end -->
<div class="main-content-inner">
    <div class="row">

        <!-- Hoverable Rows Table end -->
        <!-- Progress Table start -->
        <div class="container col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    @if(Session::has('msg'))
                        <p class="alert-alert-success">{{Session::get('msg')}}</p>
                    @endif
                <a type="button" href="{{route('workshops.create')}}" class="btn btn-primary btn-lg float-right m-3"> <i class="fa fa-plus"></i> Add Workshop</a>
                <br>
                    <h4 class="header-title">Workshop</h4>
                    <div class="container row">
                        <div class="col-md-6">
                        <form>
                            <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">Search</button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                            {{@csrf_field()}}
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Organizer</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($workshops as $item)
                                    <tr>
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$item->title}}</td>
                                        <td >{{$item->workshopCategory->name}}</td>
                                        <td >{{$item->location}}</td>
                                        <td >{{$item->start_date}}</td>
                                        <td >{{$item->organizer}}</td>
                                            <td>
                                                <form action="{{route('workshops.destroy',$item->id)}}"  method="Post">
                                                <a href="{{route('workshops.show',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                <a href="{{route('workshops.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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

        <!-- main content area end -->
@endsection
