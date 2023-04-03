<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="../../../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">{{ Auth::user()->name}}</span></a>
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
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Teacher</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('teacher.index')}}">Manage Teacher</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Department</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('departments.index')}}">Manage Department</a></li>
                        <li><a href="{{route('passingyears.index')}}">Passing Year</a></li>
                    </ul>
                </li>



                <li class="nav-small-cap">--- USER SECTION</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Students</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('student.index')}}">Manage Students</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-graduation-cap"></i><span class="hide-menu">Alumni</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="university-students.html">Alumni Approval</a></li>
                        <li><a href="{{route('alumni.index')}}">Manage Alumni</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- POST MANAGEMENT</li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Job</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="university-students.html">Job Approval</a></li>
                        <li><a href="{{route('jobs.index')}}">Manage Job</a></li>
                        <li><a href="{{route('jobcategories.index')}}">Job Category</a></li>
                        <li><a href="{{route('jobapplications.index')}}">Job Application</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Blog</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="university-students.html">Blog Approval</a></li>
                        <li><a href="{{route('blogs.index')}}">Manage Blog</a></li>
                        <li><a href="{{route('categories.index')}}">Blog Category</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Event</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="university-students.html">Event Approval</a></li>
                        <li><a href="{{route('events.index')}}">Manage Event</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Workshop</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="university-students.html">Workshop Approval</a></li>
                        <li><a href="{{route('workshops.index')}}">Manage Workshop</a></li>
                        <li><a href="{{route('workshopcategories.index')}}">Workshop Category</a></li>
                        <li><a href="{{route('speakers.index')}}">Speaker List</a></li>
                    </ul>
                </li>
                
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-bars"></i><span class="hide-menu">Courses</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="university-courses.html">All Courses</a></li>
                        <li><a href="university-add-course.html">Add Course</a></li>
                        <li><a href="university-edit-course.html">Edit Course</a></li>
                        <li><a href="university-course-info.html">Course Information</a></li>
                    </ul>
                </li>
                
                <li> <a class="waves-effect waves-dark" href="{{route('basic.create')}}"><i class="ti-calendar"></i><span class="hide-menu">Site Settings</span></a>
                </li>

                <li class="nav-small-cap"></li>
           </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>