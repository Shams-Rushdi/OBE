@extends('include.master')
@section('content')
@section('index','Job Application')
@section('title','Job Application List')
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
                        <h4 class="header-title">Job Application</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Resume </th>
                                            <th scope="col">Applicant</th>
                                            <th scope="col">Applicant Phone</th>
                                            <th scope="col">Applicant Email</th>
                                            <th scope="col">Job Title</th>
                                            <th scope="col">Delete Application</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($job_application as $item)
                                        <tr>
                                            <td >{{$loop->iteration}}</td>
                                            <td ><a href="{{asset('uploads/'.$item->resume)}}" target="blank">Open Resume</a></td>
                                            <td >{{$item->user->name}}</td>
                                            <td >{{$item->user->phone_number}}</td>
                                            <td >{{$item->user->email}}</td>
                                            <td >{{$item->job->job_title ?? ' '}}</td>
                                            <td>
                                                <form action="{{route('jobapplications.destroy',$item->id)}}"  method="Post">
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
