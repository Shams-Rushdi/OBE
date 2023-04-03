@extends('include.master')
@section('content')
@section('title','ALumni')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Alumni Approval List</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('blogs.create')}}">Add Blog</a>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Student Id</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Bkash Number</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach( as $item)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td >{{$item->title}}</td>
                                    <td >{{$item->author}}</td>
                                    <td ><img style="width:150px; height:100px;" src="{{ asset('uploads/'.$item->image)}}" alt=""></td>
                                        <td>

                                            <a href="{{route('approval.alumni',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> View</a>
                                      
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div

@endsection