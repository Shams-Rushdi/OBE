@extends('include.master')
@section('content')
@section('index','Workshops')
@section('title','Workshops List')

<style>

@import url('https://fonts.googleapis.com/css?family=Oswald');
* {
    margin: 0;
    padding: 0;
    border: 0;
    box-sizing: border-box
}

body {
    background-color: #dadde6;
    font-family: arial
}

.fl-left {
    float: left
}

.fl-right {
    float: right
}

.row {
    overflow: hidden
}

.card {
    display: table-row;
    width: 75vw;
    background-color: #fff;
    color: #989898;
    margin-bottom: 10px;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    border-radius: 4px;
    position: relative
}

.card+.card {
    margin-left: 2%
}

.date {
    display: table-cell;
    width: 40%;
    position: relative;
    text-align: center;
    border-right: 2px dashed #dadde6
}

.date:before,
.date:after {
    content: "";
    display: block;
    width: 30px;
    height: 30px;
    background-color: #DADDE6;
    position: absolute;
    top: -15px;
    right: -15px;
    z-index: 1;
    border-radius: 50%
}

.date:after {
    top: auto;
    bottom: -15px
}

.date time {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
}

.date time span {
    display: block
}

.date time span:first-child {
    color: #2b2b2b;
    font-weight: 600;
    font-size: 250%
}

.date time span:last-child {
    text-transform: uppercase;
    font-weight: 600;
    margin-top: -10px
}

.card-cont {
    display: table-cell;
    width: 75%;
    font-size: 85%;
    padding: 10px 10px 30px 50px
}

.card-cont h3 {
    color: #3C3C3C;
    font-size: 130%
}


.card-cont>div {
    display: table-row
}

.card-cont .even-date i,
.card-cont .even-info i,
.card-cont .even-date time,
.card-cont .even-info p {
    display: table-cell
}

.card-cont .even-date i,
.card-cont .even-info i {
    padding: 5% 5% 0 0
}

.card-cont .even-info p {
    padding: 30px 50px 0 0
}

.card-cont .even-date time span {
    display: block
}

.card-cont .apply {
    display: block;
    text-decoration: none;
    width: 80px;
    height: 30px;
    background-color: #037FDD;
    color: #fff;
    text-align: center;
    line-height: 30px;
    border-radius: 2px;
    position: absolute;
    right: 10px;
    bottom: 10px
}

.card-cont .cancel {
    display: block;
    text-decoration: none;
    width: 80px;
    height: 30px;
    background-color: #C70000;
    color: #fff;
    text-align: center;
    line-height: 30px;
    border-radius: 2px;
    position: absolute;
    right: 10px;
    bottom: 10px
}



@media screen and (max-width: 860px) {
    .card {
        display: block;
        float: none;
        width: 100%;
        margin-bottom: 10px
    }
    .card+.card {
        margin-left: 0
    }
    .card-cont .even-date,
    .card-cont .even-info {
        font-size: 75%
    }
}
</style>
<!-- page title area end -->
@foreach ($workshops as $item)

<section class="container d-flex justify-content-center my-5">
  <div class="row">
    <article class="card fl-left">
      <section class="date">
        <time>
          <span>{{date("d",strtotime($item->start_date))}}</span><span>{{date("M", strtotime($item->start_date))}}</span>
        </time>
      </section>
      <section class="card-cont">
      <div class="d-flex">
        @foreach ($item->speaker as $speaker)
          <div style="font-size: 1.5em">
          {{$speaker->name}} &nbsp; &nbsp;
          </div>
        @endforeach
      </div>
        <h3 class="my-3">{{$item->title}}</h3>
        <div class="even-date">

          <div>
            <span style="font-size: 1.5em"><i class="fa fa-calendar"></i>&nbsp; {{$item->start_date}} to {{$item->end_date}}</span>
          </div>
          <div>
            <span style="font-size: 1.5em"><i class="fa fa-clock-o"></i>&nbsp; {{$item->duration}} Hours</span>
          </div>

        </div>
        <div class="even-info">

          <p class="d-flex">
          <i class="fa fa-map-marker"></i> {{$item->location}}
          </p>
        </div>
        <form action="" method="post">
            @csrf
            <button class="apply" type="submit">
                Apply
            </button>
        </form>
      </section>
    </article>
  </div>
</section>
@endforeach

<!-- main content area end -->
@endsection
