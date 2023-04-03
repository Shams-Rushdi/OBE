@extends('include_sa.master')
@section("content")

<div class="container py-9">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Event</p>
                <h5 class="font-weight-bolder mb-0">
                  53,000
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Blogs</p>
                <hr>
                <h5 class="font-weight-bolder mb-0">
                  2,300
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jobs</p>
                <h5 class="font-weight-bolder mb-0">
                  3,462
                  <span class="text-danger text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Workshop</p>
                <h5 class="font-weight-bolder mb-0">
                  103,430
                  <span class="text-success text-sm font-weight-bolder"></span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 mt-4">
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">
        <h5 class="mb-1">Blogs</h5>
        <p class="text-sm">Architects design houses</p>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #2</p>
                <a href="javascript:;">
                  <h6>
                    Modern
                  </h6>
                </a>
                <p class="mb-4 text-sm">
                  As Uber works through a huge amount of internal management turmoil.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #1</p>
                <a href="javascript:;">
                  <h5>
                    Scandinavian
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Music is something that every person has his or her own specific opinion about.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 mt-4">
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">
        <h5 class="mb-1">Events</h5>
        <p class="text-sm">Architects design houses</p>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #2</p>
                <a href="javascript:;">
                  <h5>
                    Modern
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  As Uber works through a huge amount of internal management turmoil.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #1</p>
                <a href="javascript:;">
                  <h5>
                    Scandinavian
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Music is something that every person has his or her own specific opinion about.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-12 mt-4">
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">
        <h5 class="mb-1">Job</h5>
        <p class="text-sm">Architects design houses</p>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #2</p>
                <a href="javascript:;">
                  <h5>
                    Modern
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  As Uber works through a huge amount of internal management turmoil.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #1</p>
                <a href="javascript:;">
                  <h5>
                    Scandinavian
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Music is something that every person has his or her own specific opinion about.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-12 mt-4">
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">
        <h5 class="mb-1">Workshop</h5>
        <p class="text-sm">Architects design houses</p>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #2</p>
                <a href="javascript:;">
                  <h5>
                    Modern
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  As Uber works through a huge amount of internal management turmoil.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #1</p>
                <a href="javascript:;">
                  <h5>
                    Scandinavian
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Music is something that every person has his or her own specific opinion about.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card card-blog card-plain">
              <div class="position-relative">
                <a class="d-block shadow-xl border-radius-xl">
                  <img src="{{asset('frontend_sa')}}/img/home-decor-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                </a>
              </div>
              <div class="card-body px-1 pb-0">
                <p class="text-gradient text-dark mb-2 text-sm">Project #3</p>
                <a href="javascript:;">
                  <h5>
                    Minimalist
                  </h5>
                </a>
                <p class="mb-4 text-sm">
                  Different people have different taste, and various types of music.
                </p>
                <div class="d-flex align-items-center justify-content-between">
                  <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button>
                  <div class="avatar-group mt-2">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-4.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-3.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-2.jpg">
                    </a>
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                      <img alt="Image placeholder" src="{{asset('frontend_sa')}}/img/team-1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

