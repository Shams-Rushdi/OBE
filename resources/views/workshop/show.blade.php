@extends('include_sa.master')
@section("content")
<body>

  <div class="container my-8">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h4 class="mb-4 text-center">{{ $workshop->title }}</h4>
        <div class="card mb-4">
          <img class="card-img-top" src="{{ asset('uploads/'.$workshop->image)}}" height="488" width="840" alt="{{ $workshop->title }}">
          <div class="card-body">
            <h5 class="card-title">About the Workshop</h5>
            <p class="card-text">{!! $workshop->description !!}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Location:</strong> {{ $workshop->location }}</li>
            <li class="list-group-item"><strong>Date:</strong> {{ \Carbon\Carbon::parse($workshop->start_date)->format('F j, Y') }} - {{ \Carbon\Carbon::parse($workshop->end_date)->format('F j, Y') }}</li>
            <li class="list-group-item"><strong>Duration:</strong> {{ $workshop->duration }}</li>
            <li class="list-group-item"><strong>Organizer:</strong> {{ $workshop->organizer }}</li>
            @if ($workshop->type == "Paid") 
              <li class="list-group-item"><strong>Fee:</strong> {{ $workshop->cost }}</li>
            @endif
            <li class="list-group-item"><strong>Category:</strong> {{ $workshop->workshopCategory->name }}</li>
            <li class="list-group-item"><strong>Speakers:</strong>
              <ul class="list-unstyled mt-2">
                @foreach ($workshop->speaker as $speaker)
                  <li>{{ $speaker->name }}</li>
                @endforeach
              </ul>
            </li>
          </ul>
          @if ($workshop->type == "Paid") 
          <div class="d-flex justify-content-between card-body">
            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Register Now
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register For Workshop</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{route('workshopapplication.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="workshop_id" value="{{$workshop->id}}">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
                        @error('phone')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="text" name="bkash_number" class="form-control" id="exampleFormControlInput1" placeholder="Bkash Number">
                        @error('bkash_number')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="text" name="bkash_transaction" class="form-control" id="exampleFormControlInput1" placeholder="Bkash Transtaction Number">
                        @error('bkash_transaction')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn bg-gradient-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <a href="{{route('howtopay.workshop')}}" class="btn btn-info">How to Pay</a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</body>


@endsection
