@extends('include.master')
@section('content')
@section('index','Workshop Speaker')
@section('title','Workshop Speaker List')
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
                    <h4 class="header-title">Speakers</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                            {{@csrf_field()}}
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Bio</th>
                                        <th scope="col">Workshop</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($speakers as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$item->name}}</td>
                                        <td >{{$item->email}}</td>
                                        <td >{{$item->bio}}</td>
                                        <td >{{$item->workshop->title ?? ''}}</td>
                                        <td></td>
                                            <td>
                                                <form action="{{route('speakers.destroy',$item->id)}}"  method="Post">
                                                <a href="{{route('speakers.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
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
