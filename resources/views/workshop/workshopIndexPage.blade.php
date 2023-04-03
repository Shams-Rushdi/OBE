@extends('include_sa.master')
@section("content")

<div class="container py-8">
  <div class="row" >
      <div class="col-md-12 col-sm-10 mt-2">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between pb-0 p-3">
              <h5 class="mb-1">Workshops</h5>
              <div class="dropdown">
                <a href="javascript:;" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                  Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                    <li>
                      <a class="dropdown-item" href="{{route('workshop.workshopindexpage')}}">
                        All
                      </a>
                    </li>
                    @foreach ($workshop_categories as $item)
                    <li>
                        <a class="dropdown-item" href="{{route('workshopcategories.show',$item->id)}}">
                          {{$item->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
              </div>
            </div>

            <div class="card-body p-3">
              <div class="row">
              @foreach ($workshops as $workshop)
                <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
                  <div class="card card-workshop card-plain">
                    <div class="position-relative">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="{{$workshop->image ? asset('uploads/'.$workshop->image): asset('images/workshops/default-workshop-logo.jpg')}}" style="height: 250px;width: 400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                      <p class="text-gradient text-dark mb-2 text-sm">{{$workshop->workshopCategory->name}}</p>
                      @if ($workshop->type == "Paid")
                        <span class="col-md-2 bg-info mx-auto rounded text-center p-1">{{$workshop->type}}</span>
                      @else
                        <span class="col-md-2 bg-success mx-auto rounded text-center p-1" >{{$workshop->type}}</span>
                      @endif
                      <a href="javascript:;">
                        <h6>
                          {{Illuminate\Support\Str::limit($workshop->title, 26)}}
                        </h6>
                      </a>
                      @if ($workshop->type == "Paid")                          
                        <p class="mb-2 text-sm">
                            Fee: {{ ($workshop->cost) }} &#2547;
                        </p>
                      @endif
                      <p class="mb-2 text-sm">
                          {{ ($workshop->location) }}
                      </p>
                      <!-- <p class="mb-4 text-sm">
                          {!! Illuminate\Support\Str::limit($workshop->description, 30) !!}
                      </p> -->
                      <div class="d-flex align-items-center justify-content-between">
                        <a href="{{route('workshops.show',$workshop->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          {{ $workshops->links() }}
      </div>

  </div>
</div>
@endsection
