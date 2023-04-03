@extends('include.master')
@section('content')
@section('index','List of Alumini Apllication')
@section('title','Alumini')

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
                      <h4 class="header-title">Events</h4>
                      <div class="single-table">
                          <div class="table-responsive">
                              <table class="table table-hover progress-table text-center">
                              {{@csrf_field()}}
                                  <thead class="text-uppercase">
                                      <tr>
                                          <th scope="col">SL</th>
                                          <th scope="col">Student </th>
                                          <th scope="col">Status</th>
                                          <th scope="col">Action</th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                  @foreach($all_applications as $item)
                                      <tr>
                                          <td >{{$loop->iteration}}</td>
                                          <td >{{$item->user_id}}</td>
                                          <td >{{$item->status}}</td>
                                          <td>
                                            @if($item->status === 'Pending')
                                              <form action="{{ route('approve.application', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <input type="hidden" name="_method" value="POST">
                                                <button type="submit" class="btn btn-success">
                                                  <i class="fas fa-check-circle mr-2"></i>
                                                  Approve
                                                </button>
                                              </form>

                                              <form action="{{ route('decline.application', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <input type="hidden" name="_method" value="POST">
                                                <button type="submit" class="btn btn-danger">
                                                  <i class="fas fa-times-circle mr-2"></i>
                                                  Decline
                                                </button>
                                              </form>
                                            @elseif($item->status === 'Approved')
                                              <button type="button" class="btn btn-success" disabled>
                                                <i class="fas fa-check-circle mr-2"></i>
                                                Approved
                                              </button>

                                              <form action="{{ route('decline.application', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <input type="hidden" name="_method" value="POST">
                                                <button type="submit" class="btn btn-danger">
                                                  <i class="fas fa-times-circle mr-2"></i>
                                                  Decline
                                                </button>
                                              </form>
                                            @elseif($item->status === 'Declined')
                                              <form action="{{ route('approve.application', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <input type="hidden" name="_method" value="POST">
                                                <button type="submit" class="btn btn-success">
                                                  <i class="fas fa-check-circle mr-2"></i>
                                                  Approve
                                                </button>
                                              </form>

                                              <button type="button" class="btn btn-danger" disabled>
                                                <i class="fas fa-times-circle mr-2"></i>
                                                Declined
                                              </button>
                                            @endif

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

@endsection
