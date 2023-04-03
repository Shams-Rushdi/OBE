@extends('include_sa.master')
@section("content")

<div class="container col-md-12 col-sm-10 mt-10">
  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between pb-0 p-3">
      <h5 class="mb-1">Blogs</h5>
      <div class="dropdown">
        <a href="javascript:;" class="btn bg-gradient-dark  dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
          Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
          <li>
            <a class="dropdown-item" href="{{route('blog.blogindexpage')}}">
              All
            </a>
          </li>
            @foreach ($blog_categories as $item)
            <li>
                <a class="dropdown-item" href="{{route('categories.show',$item->id)}}">
                  {{$item->name}}
                </a>
            </li>
            @endforeach
        </ul>
      </div>
    </div>
    <div class="card-body p-3">
      <div class="row">
      @foreach ($blogs as $blog)
        <div class="col-xl-3 col-md-6 mb-xl-4 mb-4">
          <div class="card card-blog card-plain">
            <div class="position-relative">
              <a class="d-block shadow-xl border-radius-xl">
              <img src="{{$blog->image ?  asset('uploads/'.$blog->image) : asset('images/blogs/default-blog-logo.jpg')}}" style="height: 250px;width: 400px;" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
              </a>
            </div>
            <div class="card-body px-1 pb-0">
              <p class="text-gradient text-dark mb-2 text-sm">{{$blog->blogsCategory->name ?? ''}}</p>
              <a href="javascript:;">
                <h6>

                  {{ Illuminate\Support\Str::limit($blog->title, 25) }}

                </h6>
              </a>
              <p class="mb-4 text-sm">
                  {!! Illuminate\Support\Str::limit($blog->content, 55) !!}
              </p>
              <div class="d-flex align-items-center justify-content-between">
                <a href="{{route('blog.show',$blog->id)}}" class="btn btn-outline-primary btn-sm mb-0">View Details</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
