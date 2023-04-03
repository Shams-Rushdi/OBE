@extends('include_sa.master')
@section("content")

<script>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

  body {
    font-family: "Poppins", sans-serif !important;
  }
</script>



<div class="container mt-5 mb-4 ">
  <div style="text-align:center; margin-top:100px;">
    <img class="my-5 w-75 rounded" src="{{$blog->image ?  asset('uploads/'.$blog->image) : asset('images/blogs/default-blog-logo.jpg')}}" />
  </div>

  <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary position-relative">
    <div class="text-center mb-5 ">

    <div class="mt-5">
        <small>
         <a href="#" class="text-primary">{{$blog->blogsCategory->name}}</a>
        </small>
    </div>
    <h3 class="text-center font-weight-bold text-dark">{{$blog->title}}</h3>
    <div>
        <small class="text-dark">
          Written by <a href="#" class="text-primary">{{$blog->author}}</a>
          <p>Published on {{ $blog->created_at->format('d, F Y H:i:s a') }}</p>
      </small>
    </div>
    </div>

    <p class="my-2 text-left" style="line-height: 2; text-align:justify;">{!! $blog->content !!}
    </p>

    <div class="embed-responsive embed-responsive-16by9 mt-5 col-md-12 col-sm-12">
        <iframe id="my-video-link" class="embed-responsive-item col-md-12 col-sm" src="{{$blog->video}}" style="min-width:430px; min-height:380px"></iframe>
    </div>

  </div>
</div>

<script>
const videoLink = document.getElementById("my-video-link");

// Check if the video link is a short link
if (videoLink.src.includes("youtu.be")) {
  // Convert the short link to a long link and set it as the new video link
  const newLink = "https://www.youtube.com/embed/" + videoLink.src.split("/").pop();
  videoLink.src = newLink;
}else if (videoLink.src.includes("youtube.com/watch")) {
  // Append "/embed" to the end of the video ID and set it as the new video link
  const videoId = videoLink.src.split("v=")[1];
  const newLink = "https://www.youtube.com/embed/" + videoId;
  videoLink.src = newLink;
}else if (videoLink.src.includes("vimeo.com")) {
  // Convert Vimeo link to player link
  const videoId = videoLink.src.split("/").pop();
  const newLink = "https://player.vimeo.com/video/" + videoId;
  videoLink.src = newLink;
}
</script>

@endsection
