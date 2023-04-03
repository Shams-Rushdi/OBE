@extends('include.master')
@section('content')
@section('title','Workshop')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">WorkShop List</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <a class="btn btn-info btn-rounded m-t-10 float-end text-white" href="{{route('workshops.create')}}">Add WorkShop</a>
                <div class="table-responsive m-t-40">
                    <table id="example23"
                        class="display nowrap table table-hover table-striped border"
                        cellspacing="0" width="100%">
                        {{@csrf_field()}}
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Type</th>
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
                                        <td >{{$item->type}}</td>
                                        <td >{{$item->location}}</td>
                                        <td >{{$item->start_date}}</td>
                                        <td >{{$item->organizer}}</td>
                                            <td>
                                                <form action="{{route('workshops.destroy',$item->id)}}"  method="Post">
                                                <a href="{{route('workshop.admin.show',$item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
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
</div

@endsection
