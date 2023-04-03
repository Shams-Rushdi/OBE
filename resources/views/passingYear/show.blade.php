@extends('include_sa.master')
@section("content")

<div class="container py-9">
<div class="row" >
    <div class="col-8 mt-2">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <h5 class="mb-1">Blogs</h5>

          </div>
          <div class="card-body p-3">
            <div class="row">
            @foreach ($category->blogs as $blog)
              <div class="col-xl-4 col-md-6 mb-xl-4 mb-4">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="{{asset('uploads/'.$blog->image)}}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                  <div class="card-body px-1 pb-0">
                    <p class="text-gradient text-dark mb-2 text-sm">{{$blog->blogsCategory->name}}</p>
                    <a href="javascript:;">
                      <h6>
                        {{$blog->title}}
                      </h6>
                    </a>
                    <p class="mb-4 text-sm">
                        {{ Illuminate\Support\Str::limit($blog->content, 30) }}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                      <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>
    <div class="col-4 mt-2">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <h5 style="margin-bottom: 50px;">Category</h5>

            <ul class="list-group">
              @foreach ($categories as $category)
              <li class="list-group-item bg-light text-dark mb-2 border border-white active"><a href="{{route('categories.show', $category->id)}}"> {{$category->name}}</a>   </li>
              @endforeach

            </ul>

          </div>

        </div>
    </div>
</div>
    </div>
@endsection
