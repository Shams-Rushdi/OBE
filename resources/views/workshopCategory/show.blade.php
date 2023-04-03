@extends('include_sa.master')
@section("content")

<div class="container py-9">
<div class="row" >
    <div class="col-12 mt-2">
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
                        {{$item->name, 30}}
                      </a>
                  </li>
                  @endforeach
              </ul>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
            @foreach ($workshop_category->workshops as $workshop)
              <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
                <div class="card card-workshop card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="{{asset('uploads/'.$workshop->image)}}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                  <div class="card-body px-1 pb-0">
                    <p class="text-gradient text-dark mb-2 text-sm">{{$workshop->workshopCategory->name, 20}}</p>
                    <a href="javascript:;">
                      <h6>
                        {!! Illuminate\Support\Str::limit($workshop->title, 35) !!}
                      </h6>
                    </a>
                    <p class="mb-4 text-sm">
                        {!! Illuminate\Support\Str::limit($workshop->description, 30) !!}
                    </p>
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
    </div>

</div>
    </div>
@endsection
