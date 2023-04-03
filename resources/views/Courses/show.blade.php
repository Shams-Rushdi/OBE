@extends('include_sa.master')
@section("content")

<script>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");

  body {
    font-family: "Poppins", sans-serif !important;
  }
</script>



<div class="container mt-5 mb-4 ">
    <!--
  <div style="text-align:center; margin-top:100px;">
    <img class="my-5 w-75 rounded" src="{{$course->image ?  asset('uploads/'.$course->image) : asset('images/course/default-course-image.jpg')}}" />
  </div>
  -->

  <div style="max-width: 700px; top: 80px;" class="mx-auto text-secondary position-relative">
    <div class="text-center mb-5 ">

    <div class="mt-5">
        <small>
         
        </small>
    </div>
    <h4 class="text-center font-weight-bold text-dark">{{$course->title}}</h4>
        <div>
           <p>Posted on {{ $course->created_at->format('d, F Y') }}</p>
        </div>
    </div>



    <div class="embed-responsive embed-responsive-16by9 mt-5 col-md-12 col-sm-12">
        <iframe id="my-video-link" class="embed-responsive-item col-md-12 col-sm" src="{{$course->youtube_url}}" style="min-width:430px; min-height:380px"></iframe>
    </div>
    
    <p class="my-2 text-left " style="line-height: 2; text-align:justify;">{!! $course->description !!}</p>
    <br>

  </div>
</div>

<script>
const videoLink = document.getElementById("my-video-link");

if (videoLink.src.includes("youtu")) {
  // Extract the video ID from the URL
  let videoId = videoLink.src.split("/").pop();
  if (videoLink.src.includes("watch")) {
    videoId = videoLink.src.split("v=")[1];
    if (videoId.includes("&")) {
      videoId = videoId.split("&")[0];
    }
  }
  // Construct the new video link
  const newLink = "https://www.youtube.com/embed/" + videoId;
  videoLink.src = newLink;
} else if (videoLink.src.includes("vimeo")) {
  // Extract the video ID from the URL
  const videoId = videoLink.src.split("/").pop();
  // Construct the new video link
  const newLink = "https://player.vimeo.com/video/" + videoId;
  videoLink.src = newLink;
}

</script>

@endsection
