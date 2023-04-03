<aside class="left-sidebar no-print">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ asset('images/profile/'.Auth::user()->profile_image)}}" alt="" class="img-circle"><span class="hide-menu">{{ Auth::user()->name}}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.profile',[Auth::user()->id])}}"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="{{route('admin.password',[Auth::user()->id])}}"><i class="ti-wallet"></i> Change Password</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{route('home')}}"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                @hasrole('SuperAdmin')
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Super Admin</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('superadmin.index')}}">Manage Super Admin</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Role & Permission</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('role.index')}}">Role</a></li>
                        <li><a href="{{route('permission.index')}}">Create Permission</a></li>
                        <li><a href="{{route('role-permission.index')}}">Manage Permission</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Admin</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.index')}}">Manage Admin</a></li>

                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Committee</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('committeecategory.index')}}">Manage Category</a></li>
                        <li><a href="{{route('committee.index')}}">Manage Committee</a></li>

                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Department</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('departments.index')}}">Manage Department</a></li>
                        <li><a href="{{route('passingyears.index')}}">Passing Year</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Plan Setting</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('plans.index')}}">Manage Plan</a></li>
                    </ul>
                </li>

                @endhasrole

                @hasanyrole('SuperAdmin|Admin')
                <li class="nav-small-cap">--- USER SECTION</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Teacher</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('teacher.index')}}">Manage Teacher</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-graduation-cap"></i><span class="hide-menu">Alumni</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('alumni.approval')}}">Alumni Approval</a></li>
                        <li><a href="{{route('alumni.index')}}">Manage Alumni</a></li>
                    </ul>
                </li>
                @hasanyrole('SuperAdmin|Admin|Teacher')

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Students</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('student.index')}}">Manage Students</a></li>
                    </ul>
                </li>

                <li class="nav-small-cap">--- POST MANAGEMENT</li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Job</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('approval.jobs')}}">Job Approval</a></li>
                        <li><a href="{{route('jobs.index')}}">Manage Job</a></li>
                        <li><a href="{{route('jobcategories.index')}}">Job Category</a></li>
                        <li><a href="{{route('jobapplications.index')}}">Job Application</a></li>
                    </ul>
                </li>
                @if(auth()->user()->can('blog list'))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Blog</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('approval.blogs')}}">Blog Approval</a></li>
                        <li><a href="{{route('blog.index')}}">Manage Blog</a></li>
                        <li><a href="{{route('categories.index')}}">Blog Category</a></li>
                    </ul>
                </li>
                @endif

                @if(auth()->user()->can('event list'))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Event</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('event.index')}}">Manage Event</a></li>
                        <li><a href="{{route('eventapplication.index')}}">Manage Event Application</a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->can('workshop list'))
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Workshop</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('workshopcategories.index')}}">Workshop Category</a></li>
                        <li><a href="{{route('workshops.index')}}">Manage Workshop</a></li>
                        <li><a href="{{route('speakers.index')}}">Speaker List</a></li>
                        <li><a href="{{route('workshopapplication.index')}}"> <span>Workshop Applications</span></a></li>
                    </ul>
                </li>
                @endif

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-bars"></i><span class="hide-menu">Online Courses</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('coursecategory.index')}}">Manage Category</a></li>
                        <li><a href="{{route('course.index')}}">Manage Courses</a></li>
                    </ul>
                </li>
                @endhasanyrole
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" icons-Optimization"></i><span class="hide-menu">Advertisement</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('advertisements.index')}}">Manage Ads</a></li>
                    </ul>
                </li>

                <li> <a class="waves-effect waves-dark" href="{{route('basic.create')}}"><i class="ti-calendar"></i><span class="hide-menu">Site Settings</span></a>
                </li>
            
                <li class="nav-small-cap"></li>
                @endhasanyrole
           </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
