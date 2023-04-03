@extends('include.master')
@section('content')
@section('index','My Job Application')
@section('title','My Job Application List')
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
                                            <th scope="col">Job Title</th>
                                            <th scope="col">View Job</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($job_application as $item)
                                        <tr>
                                            <td >{{$loop->iteration}}</td>
                                            <td ><a href="{{asset('uploads/'.$item->resume)}}" target="blank">Open Resume</a></td>
                                            <td >{{$item->user->name}}</td>
                                            <td >{{$item->job->job_title}}</td>
                                            <td>
                                                <a href="{{route('jobs.show',$item->job->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View Job</a>
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
