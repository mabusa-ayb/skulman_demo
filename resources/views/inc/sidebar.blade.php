<!-- navbar-static-side -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>

            <li>
                <a href="#" onclick="return false;"><i class="fa fa-user fa-fw"></i> Logged in as <span style="color: red;">{{ Auth::user()->name }}</span></a>
            </li>

            <li>
                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            @can('isStudent')
                <li>
                    <a href="student/{{ Auth::user()->id }}"><i class="fa fa-th fa-fw"></i> Marks</a>
                </li>
            @endcan

            @canany(['isAdmin','isHeadmaster'])
            <li>
                <a href="{{ route('school_class.index') }}"><i class="fa fa-th fa-fw"></i> Classes</a>
            </li>

            <li>
                <a href="{{ route('administrator.index') }}"><i class="fa fa-certificate fa-fw"></i> Administrators</a>
            </li>
            @endcanany

            @can('isTeacher')
            <li>
                <a href="#" onclick="return false;"><i class="fa fa-bookmark fa-fw"></i> Class-Room Management<span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ route('class_list.index') }}">Class List</a>
            </li>
            <!--
            <li>
                <a href="#">Exam Marks</a>
            </li>
            -->
            @endcan

            @canany(['isAdmin','isHeadmaster','isClerk'])
            <li>
                <a href="{{ route('registration.index') }}"><i class="fa fa-th-list fa-fw"></i> Admissions</a>
            </li>

            <li>
                <a href="{{ route('teacher.index') }}"><i class="fa fa-briefcase fa-fw"></i> Teachers</a>
            </li>

            <li>
                <a href="{{ route('admin_monitor.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Class Reports</a>
            </li>

            <li>
                <a href="{{ route('subject.index') }}"><i class="fa fa-bookmark-o fa-fw"></i> Subjects</a>
            </li>

            <li>
                <a href="#" onclick="return false;"><i class="fa fa-tags fa-fw"></i> Class Allocations<span class="fa arrow"></span></a>
            </li>

            <li>
                <a href="{{ route('teacher_allocation.index') }}">Teacher Allocation</a>
            </li>
            <li>
                <a href="{{ route('student_allocation.index') }}">Student Allocation</a>
            </li>
            @endcanany

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
<!--.\ Navigation -->
