<body class="">
  <div class="container position-sticky z-index-sticky top-1">
    <div class="row">
      <div class="col-12">
<nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
  <div class="container-fluid pe-0">
    <a class="navbar-brand font-weight-bolder ms-lg-1 ms-3 " href="{{route('student_dashboard')}}">
      <img src="{{asset('site_logo/'.$setting->logo)}}" alt="" style="width: 50px">
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{route('student_dashboard')}}">
            <i class="fas fa-chart-pie me-1"></i>
            Dashboard
          </a>
        </li>
 
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('blog.blogindexpage')}}">
            <i class="fas fa-blog"></i>
             Blog
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('event.eventindexpage')}}">
            <i class="fas fa-calendar-check"></i>
             Event
          </a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('job.jobindexpage')}}">
            <i class="fas fa-briefcase"></i>
             Job
          </a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('workshop.workshopindexpage')}}">
            <i class="fas fa-hammer"></i>
             Workshop
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('public.search')}}">
            <i class="fas fa-search me-1"></i>
             Search
          </a>
        </li>

        @hasrole('Alumni')
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('myjob.alumni')}}">

            <i class="ni ni-badge me-1"></i>
            My Job
          </a>
        </li>
        @endhasrole

        {{-- @hasrole('Student')
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('student.profile')}}">
            <i class="ni ni-hat-3 me-1"></i>
            Apply For Alumni
          </a>
        </li>
        @endhasrole --}}

        @hasrole('Student')
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('student.profile')}}">
            <i class="fas fa-user me-1"></i>
            Profile
          </a>
        </li>
        @endhasrole

        @hasrole('Alumni')
        <li class="nav-item">
          <a class="nav-link me-2" href="{{route('alumni.profile')}}">
            <i class="fa fa-user me-1"></i>
            Profile
          </a>
        </li>
        @endhasrole
        
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
           Log Out</a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </li>
      </ul>
 
    </div>
  </div>
</nav>

</div>
</div>
</div>
