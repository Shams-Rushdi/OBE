<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <h3 style="color:white;">AmaCom Soft</h3>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{route('home')}}" aria-expanded="true" style="font-size: 20px;"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                    </li>

                    @hasrole('SuperAdmin')
                   
                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-crown"></i><span>Super Admin

                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('superadmin.index')}}"><i class="ti-arrow-circle-right"></i> <span>Super Admin</span></a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-control-shuffle"></i><span>Role And Permissions

                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('role.index')}}"><i class="ti-arrow-circle-right"></i> <span>Role</span></a></li>
                        </ul>
                        <ul class="collapse">
                            <li><a href="{{route('permission.index')}}"><i class="ti-arrow-circle-right"></i> <span>Permission</span></a></li>
                        </ul>

                        <ul class="collapse">
                            <li><a href="{{route('role-permission.index')}}"><i class="ti-arrow-circle-right"></i> <span>Role-Permission</span></a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Admin

                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('admin.index')}}"><i class="ti-arrow-circle-right"></i> <span>Admin</span></a></li>
                        </ul>
                    </li>

                    @endhasrole

                    @hasanyrole('SuperAdmin|Admin')
                    <li class="active">
                        <a href="" aria-expanded="true"><i class="fa fa-industry"></i><span>University</span></a>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-column3-alt"></i><span>Department
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('departments.index')}}"><i class="ti-arrow-circle-right"></i> <span>Department List</span></a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-calendar"></i><span>Passing Year
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('passingyears.index')}}"><i class="ti-arrow-circle-right"></i> <span>Passing Year List</span></a></li>
                        </ul>
                    </li>



                    
                    <li class="active">
                        <a href="" aria-expanded="true"><i class="fa fa-industry"></i><span>Post Management</span></a>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-cup"></i><span> Events</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('events.index')}}"><i class="ti-arrow-circle-right"></i> <span>Events List </span></a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Jobs</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('jobs.list')}}"><i class="ti-arrow-circle-right"></i> <span>Find Jobs</span></a></li>

                            <li class="active">
                            <li><a href="{{route('jobcategories.index')}}"><i class="ti-arrow-circle-right"></i> <span>Manage Category </span></a></li>

                            <li><a href="{{route('jobs.index')}}"><i class="ti-arrow-circle-right"></i> <span>Manage Job List </span></a></li>

                            <li><a href="{{route('jobapplications.index')}}"><i class="ti-arrow-circle-right"></i> <span>Manage Applications </span></a></li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-tab-window"></i><span>Blog</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('categories.index')}}"><i class="ti-arrow-circle-right"></i> <span>Blog Category</span></a></li>
    
                            <li><a href="{{route('blogs.index')}}"><i class="ti-arrow-circle-right"></i> <span>Blog Posts</span></a></li>
                        </ul>
                    </li>
    
                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-hummer"></i><span>Workshop</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('workshopcategories.index')}}"><i class="ti-arrow-circle-right"></i> <span>Workshop Categories</span></a></li>
                            <li><a href="{{route('workshops.list')}}"><i class="ti-arrow-circle-right"></i> <span>Workshops</span></a></li>
                            <li><a href="{{route('workshopapplication.index')}}"><i class="ti-arrow-circle-right"></i> <span>Applications</span></a></li>
                            <li><a href="{{route('workshops.index')}}"><i class="ti-arrow-circle-right"></i> <span>Manage Workshops</span></a></li>
                            <li><a href="{{route('speakers.index')}}"><i class="ti-arrow-circle-right"></i> <span>Manage Speaker List</span></a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="" aria-expanded="true"><i class="fa fa-industry"></i><span>Teacher Management</span></a>
                    </li>

                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i><span>Teacher
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('teacher.index')}}"><i class="ti-map-alt"></i> <span>Teacher</span></a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="" aria-expanded="true"><i class="fa fa-industry"></i><span>Student Management</span></a>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bag"></i><span>Student
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('student.index')}}"><i class="ti-arrow-circle-right"></i> <span>Student</span></a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="" aria-expanded="true"><i class="fa fa-industry"></i><span>Alumni Management</span></a>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-direction"></i><span>Alumni
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('alumni.index')}}"><i class="ti-arrow-circle-right"></i> <span>Manage Alumni</span></a></li>
                        </ul>
                        <ul class="collapse">
                            <li><a href="{{route('alumini.apply')}}"><i class="ti-arrow-circle-right"></i> <span>Apply For Alumini</span></a></li>
                        </ul>
                        <ul class="collapse">
                            <li><a href="{{route('aluminiapplications.index')}}"><i class="ti-arrow-circle-right"></i> <span>Alumini Application List</span></a></li>
                        </ul>
                    </li>


                    <li class="active">
                        <a href="" aria-expanded="true"><i class="fa fa-industry"></i><span>Others Settings</span></a>
                    </li>
                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-calendar"></i><span>Site Settings
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('basic.create')}}"><i class="ti-arrow-circle-right"></i> <span>Site Setting</span></a></li>
                        </ul>
                    </li>
                    
                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-blackboard"></i><span>Notice</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('notices.index')}}"><i class="ti-arrow-circle-right"></i> <span>Notice List</span></a></li>
                        </ul>
                    </li>


                    <li class="">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-microphone-alt"></i><span>Speaker
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('speakers.index')}}"><i class="ti-arrow-circle-right"></i> <span>Speaker List</span></a></li>
                        </ul>
                    </li>
                    @endhasanyrole
            </nav>
        </div>
    </div>
</div>
