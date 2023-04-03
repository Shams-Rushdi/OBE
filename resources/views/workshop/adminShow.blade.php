<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend_sa')}}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('frontend_sa')}}/img/favicon.png">
  <title>
    {{$setting->site_title}}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('frontend_sa/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend_sa')}}/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('frontend_sa')}}/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('frontend_sa')}}/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
<!-- Bootstrap Icons CSS -->


</head>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3 class="mb-4 text-center">{{ $workshop->title }}</h3>
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
            <li class="list-group-item"><strong>Fee:</strong> {{ $workshop->cost }}</li>
            <li class="list-group-item"><strong>Category:</strong> {{ $workshop->workshopCategory->name }}</li>
            <li class="list-group-item"><strong>Speakers:</strong>
              <ul class="list-unstyled mt-2">
                @foreach ($workshop->speaker as $speaker)
                  <li>{{ $speaker->name }}</li>
                @endforeach
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>

</html>