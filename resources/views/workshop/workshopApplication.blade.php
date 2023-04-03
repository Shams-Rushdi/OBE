@extends('include.master')
@section('content')
@section('index','Join Workshop')
@section('title','Workshops')

<div class="single-table">
    <div class="table-responsive">
        <table class="table table-hover progress-table text-center">
        {{@csrf_field()}}
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">
                        Workshop Title
                    </th>
                    <th scope="col">Applicant Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Bkash Number</th>
                    <th scope="col">Bkash Transaction</th>
                    <th scope="col">Application Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($workshopApplication as $item)
                <tr>
                    <td >{{$loop->iteration}}</td>
                    <td >{{$item->workshop->title}}</td>
                    <td >{{$item->name}}</td>
                    <td >{{$item->phone_number}}</td>
                    <td >{{$item->email}}</td>
                    <td >{{$item->bkash_number}}</td>
                    <td >{{$item->bkash_transaction}}</td>
                    <td >{{$item->application_date}}</td>
                    <td>
                        @if($item->status === 'Pending')
                        <div class="d-flex">
                          <form action="{{ route('approve.workshopapplication', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-success">
                              <i class="fas fa-check-circle mr-2"></i>
                              Approve
                            </button>
                          </form>

                          <form action="{{ route('decline.workshopapplication', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-danger">
                              <i class="fas fa-times-circle mr-2"></i>
                              Decline
                            </button>
                          </form>
                        </div>
                        @elseif($item->status === 'Approved')
                          <form action="{{ route('decline.workshopapplication', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-danger">
                              <i class="fas fa-times-circle mr-2"></i>
                              Decline
                            </button>
                          </form>
                        @elseif($item->status === 'Declined')
                          <form action="{{ route('approve.workshopapplication', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-success">
                              <i class="fas fa-check-circle mr-2"></i>
                              Approve
                            </button>
                          </form>
                        @endif

                      </td>
                        <td>
                            <form action="{{route('workshopapplication.destroy',$item->id)}}"  method="Post">
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

@endsection
