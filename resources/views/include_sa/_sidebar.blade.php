<div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('frontend')}}/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="">
                                <a href="" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>

                            </li>
                            @hasrole('SuperAdmin')

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Super Admin

                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('superadmin.index')}}"><i class="ti-map-alt"></i> <span>Super Admin</span></a></li>
                                </ul>
                            </li>

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Role And Permissions

                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('role.index')}}"><i class="ti-map-alt"></i> <span>Role</span></a></li>
                                </ul>
                                <ul class="collapse">
                                    <li><a href="{{route('permission.index')}}"><i class="ti-map-alt"></i> <span>Permission</span></a></li>
                                </ul>

                                <ul class="collapse">
                                    <li><a href="{{route('role-permission.index')}}"><i class="ti-map-alt"></i> <span>Role-Permission</span></a></li>
                                </ul>
                            </li>


                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Admin

                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('admin.index')}}"><i class="ti-map-alt"></i> <span>Admin</span></a></li>

                                <ul class="collapse">
                                    <li><a href="{{route('role-permission.index')}}"><i class="ti-map-alt"></i> <span>Role-Permission</span></a></li>

                            </li>

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Admin

                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('admin.index')}}"><i class="ti-map-alt"></i> <span>Admin</span></a></li>
                            </li>
                            @endhasrole

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span> Events</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('events.index')}}"><i class="ti-map-alt"></i> <span>Events List </span></a></li>

                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Notice</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('notices.index')}}"><i class="ti-map-alt"></i> <span>Notice List</span></a></li>
                                </ul>
                            </li>

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Jobs</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('jobs.index')}}"><i class="ti-map-alt"></i> <span>Manage Job List </span></a></li>
                                    <li><a href="{{route('jobapplications.index')}}"><i class="ti-map-alt"></i> <span>Manage Job Applications </span></a></li>
                                </ul>
                            </li>

                        <li class="active">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Blog</span></a>
                            <ul class="collapse">
                                <li><a href="{{route('categories.index')}}"><i class="ti-map-alt"></i> <span>Blog Category</span></a></li>

                                <li><a href="{{route('blogs.index')}}"><i class="ti-map-alt"></i> <span>Blog Posts</span></a></li>
                            </ul>
                        </li>

                        <li class="active">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Workshop</span></a>
                            <ul class="collapse">
                                <li><a href="{{route('workshops.list')}}"><i class="ti-map-alt"></i> <span>Workshops</span></a></li>
                                <li><a href="{{route('workshopapplication.index')}}"><i class="ti-map-alt"></i> <span>Workshop Application</span></a></li>
                                <li><a href="{{route('workshops.index')}}"><i class="ti-map-alt"></i> <span>Manage Workshops</span></a></li>
                                <li><a href="{{route('speakers.index')}}"><i class="ti-map-alt"></i> <span>Manage Speaker List</span></a></li>
                            </ul>
                        </li>



                            <li class="active">

                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Teacher

                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('teacher.index')}}"><i class="ti-map-alt"></i> <span>Teacher</span></a></li>


                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Jobs</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('jobs.index')}}"><i class="ti-map-alt"></i> <span>Jobs List </span></a></li>

                                </ul>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Student

                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('student.index')}}"><i class="ti-map-alt"></i> <span>Student</span></a></li>
                                </ul>
                            </li>
                            <li class="active">

                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Alumni

                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('alumni.index')}}"><i class="ti-map-alt"></i> <span>Alumni</span></a></li>
                                </ul>
                            </li>



                            {{-- <li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li>
                            <li><a href="invoice.html"><i class="ti-receipt"></i> <span>Invoice Summary</span></a></li> --}}


                            {{-- <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Blog</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('categories.index')}}"><i class="ti-map-alt"></i> <span>Blog Category</span></a></li>

                                    <li><a href="{{route('blogs.index')}}"><i class="ti-map-alt"></i> <span>Blog Posts</span></a></li>
                                </ul>
                            </li>

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Workshop</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('workshops.index')}}"><i class="ti-map-alt"></i> <span>Workshops List</span></a></li>
                                    <li><a href="{{route('speakers.index')}}"><i class="ti-map-alt"></i> <span>Speaker List</span></a></li>
                                </ul>
                            </li> --}}



                        </ul>
                    </nav>
                </div>
            </div>
        </div>
