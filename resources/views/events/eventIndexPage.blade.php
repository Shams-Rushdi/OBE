@extends('include_sa.master')
@section("content")

<div class="container py-9">
<div class="row" >
    <div class="col-12 mt-2">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <h5 class="mb-1">Events</h5>

          </div>
          <div class="card-body p-4">
            <div class="row">
            @foreach ($events as $event)
              <div class="col-xl-4 col-md-6 mb-xl-4 mb-4">
                <div class="card card-event card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="{{$event->image ?  asset('uploads/'.$event->image) : asset('images/events/default-event-logo.jpg')}}" style="height: 250px;width: 400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                  <div class="card-body px-1 pb-0">
                    @if ($event->type == "Paid")
                    <span class="col-md-2 bg-info mx-auto rounded text-center p-1">{{$event->type}}</span>
                  @else
                    <span class="col-md-2 bg-success mx-auto rounded text-center p-1" >{{$event->type}}</span>
                  @endif
                    <a href="javascript:;">
                      <h6>
                        {{$event->title}}
                      </h6>
                    </a>
                    @if ($event->type == "Paid")                          
                    <p class="mb-2 text-sm">
                        Fee: {{ ($event->cost) }} &#2547;
                    </p>
                    @endif
                    <p class="mb-4 text-sm">
                        {!! Illuminate\Support\Str::limit($event->description, 30) !!}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                      <a href="{{route('event.show', $event->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
</div>
    </div>
@endsection
