
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
 
    <a href="" class="brand-link">
      <img src="{{url('public/assets/dist/img/logo.png')}}" alt="ims" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-size: 15px">Institute Management System</span>
    </a>

 
    <div class="sidebar">
     
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('public/assets/dist/img/man_12832591.png')}}" class="img-circle elevation-2" alt="User Image"> 
          
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
          
        </div>
      </div>

   
    
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @if(Auth::user()->user_type == 1)
          <li class="nav-item ">
            <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Admin
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/teacher/list')}}" class="nav-link @if(Request::segment(2) == 'teacher') active @endif">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Teacher
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Student
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/parent/list')}}" class="nav-link @if(Request::segment(2) == 'parent') active @endif">
              <i class="nav-icon fas fas fa-user-friends"></i>
              <p>
                Parent
              </p>
            </a>
          </li>

          <li class="nav-item @if(Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher'|| Request::segment(2) == 'class_timetable') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'class' || Request::segment(2) == 'subject' || Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher'|| Request::segment(2) == 'class_timetable') active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Academics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/class/list')}}" class="nav-link @if(Request::segment(2) == 'class') active @endif">
                  <i class="nav-icon fas fa-school"></i>
                  <p>Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/subject/list')}}" class="nav-link @if(Request::segment(2) == 'subject') active @endif">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/assign_subject/list')}}" class="nav-link @if(Request::segment(2) == 'assign_subject') active @endif">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Assign Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/class_timetable/list')}}" class="nav-link @if(Request::segment(2) == 'class_timetable') active @endif">
                  <i class="nav-icon 	fas fa-calendar-alt"></i>
                  <p>Class Timetable</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/assign_class_teacher/list')}}" class="nav-link @if(Request::segment(2) == 'assign_class_teacher') active @endif">
                  <i class="nav-icon fas fa-book-reader"></i>
                  <p>Assign Class Teacher</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if(Request::segment(2) == 'examinations') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'examinations') active @endif">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Examination
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/examinations/exam/list')}}" class="nav-link @if(Request::segment(3) == 'exam') active @endif">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Exam List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/examinations/exam_schedule')}}" class="nav-link @if(Request::segment(3) == 'exam_schedule') active @endif">
                  <i class="nav-icon  far fa-calendar-minus"></i>
                  <p>Exam Schedule</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/examinations/mark_register')}}" class="nav-link @if(Request::segment(3) == 'mark_register') active @endif">
                  <i class="nav-icon fas fa-clipboard"></i>
                  <p>Mark Register</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/examinations/mark_grade')}}" class="nav-link @if(Request::segment(3) == 'mark_grade') active @endif">
                  <i class="nav-icon fas fa-language"></i>
                  <p>Manage Grade</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if(Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'attendance') active @endif">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/attendance/student')}}" class="nav-link @if(Request::segment(3) == 'student') active @endif">
                  <i class="nav-icon fa fa-id-badge "></i>
                  <p>Student Attendance</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/attendance/report')}}" class="nav-link @if(Request::segment(3) == 'report') active @endif">
                  <i class="nav-icon fas fa-chart-area"></i>
                  <p>Attendance Report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if(Request::segment(2) == 'fee_collection') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'fee_collection') active @endif">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Fee Collection
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/fee_collection/collect_fee')}}" class="nav-link @if(Request::segment(3) == 'collect_fee') active @endif">
                  <i class="nav-icon 	fas fa-credit-card"></i>
                  <p>Collect Fees</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if(Request::segment(2) == 'communication') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'communication') active @endif">
              <i class="nav-icon 	fas fa-bullhorn"></i>
              <p>
                Communication
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/communication/notice_board')}}" class="nav-link @if(Request::segment(3) == 'notice_board') active @endif">
                  <i class="nav-icon fas fa-chalkboard"></i>
                  <p>Notice Board</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/communication/send_email')}}" class="nav-link @if(Request::segment(3) == 'send_email') active @endif">
                  <i class="nav-icon fas fa-envelope-open"></i>
                  <p>Send Email</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if(Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'homework') active @endif">
              <i class="nav-icon 	fas fa-archive"></i>
              <p>
                Homework
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/homework/homework')}}" class="nav-link @if(Request::segment(3) == 'homework') active @endif">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Homework</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/homework/homework_report')}}" class="nav-link @if(Request::segment(3) == 'homework_report') active @endif">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Homework Report</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item ">
            <a href="{{url('admin/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type == 2)

          <li class="nav-item ">
            <a href="{{url('teacher/dashboard')}}" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('teacher/my_calendar')}}" class="nav-link @if(Request::segment(2) == 'my_calendar') active @endif">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('teacher/my_student')}}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                My Student
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('teacher/my_class_subject')}}" class="nav-link @if(Request::segment(2) == 'my_class_subject') active @endif">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                My Class & Subject
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('teacher/mark_register')}}" class="nav-link @if(Request::segment(2) == 'mark_register') active @endif">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Mark Register
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('teacher/my_exam_timetable')}}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                My Exam Timetable
              </p>
            </a>
          </li>
          <li class="nav-item @if(Request::segment(2) == 'homework') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'homework') active @endif">
              <i class="nav-icon 	fas fa-archive"></i>
              <p>
                Homework
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('teacher/homework/homework')}}" class="nav-link @if(Request::segment(3) == 'homework') active @endif">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Homework</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if(Request::segment(2) == 'attendance') menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(Request::segment(2) == 'attendance') active @endif">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('teacher/attendance/student')}}" class="nav-link @if(Request::segment(3) == 'student') active @endif">
                  <i class="nav-icon fa fa-id-badge "></i>
                  <p>Student Attendance</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('teacher/attendance/report')}}" class="nav-link @if(Request::segment(3) == 'report') active @endif">
                  <i class="nav-icon fas fa-chart-area"></i>
                  <p>Attendance Report</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
                <a href="{{url('teacher/my_notice_board')}}" class="nav-link @if(Request::segment(3) == 'my_notice_board') active @endif">
                  <i class="nav-icon fas fa-chalkboard"></i>
                  <p>My Notice Board</p>
                </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('teacher/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('teacher/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>


          @elseif(Auth::user()->user_type == 3)

          <li class="nav-item ">
            <a href="{{url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('student/my_calendar')}}" class="nav-link @if(Request::segment(2) == 'my_calendar') active @endif">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>


          <li class="nav-item ">
            <a href="{{url('student/my_subject')}}" class="nav-link @if(Request::segment(2) == 'my_subject') active @endif">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                My Subject
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('student/my_timetable')}}" class="nav-link @if(Request::segment(2) == 'my_timetable') active @endif">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                My Timetable
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('student/my_exam_timetable')}}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                My Exam Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
                <a href="{{url('student/my_homework')}}" class="nav-link @if(Request::segment(2) == 'my_homework') active @endif">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>My Homework</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="{{url('student/my_submitted_homework')}}" class="nav-link @if(Request::segment(2) == 'my_submitted_homework') active @endif">
                  <i class="nav-icon fas fa-file-image"></i>
                  <p>Submitted Homework</p>
                </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('student/my_attendance')}}" class="nav-link @if(Request::segment(2) == 'my_attendance') active @endif">
              <i class="nav-icon nav-icon fa fa-tasks"></i>
              <p>
                My Attendance
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('student/my_exam_result')}}" class="nav-link @if(Request::segment(2) == 'my_exam_result') active @endif">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                My Exam Result
              </p>
            </a>
          </li>

          <li class="nav-item">
                <a href="{{url('student/my_notice_board')}}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
                  <i class="nav-icon fas fa-chalkboard"></i>
                  <p>My Notice Board</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="{{url('student/fee_collection')}}" class="nav-link @if(Request::segment(2) == 'fee_collection') active @endif">
                  <i class="nav-icon nav-icon fas fa-money-check-alt"></i>
                  <p>Fee Collection</p>
                </a>
          </li>
       

          <li class="nav-item ">
            <a href="{{url('student/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('student/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type == 4)

          <li class="nav-item ">
            <a href="{{url('parent/dashboard')}}" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('parent/my_student')}}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                My Student
              </p>
            </a>
          </li>

          <li class="nav-item">
                <a href="{{url('parent/my_notice_board')}}" class="nav-link @if(Request::segment(3) == 'my_notice_board') active @endif">
                  <i class="nav-icon fas fa-chalkboard"></i>
                  <p>My Notice Board</p>
                </a>
          </li>

          <li class="nav-item">
                <a href="{{url('parent/my_student_notice_board')}}" class="nav-link @if(Request::segment(3) == 'my_student_notice_board') active @endif">
                  <i class="nav-icon 	fas fa-chalkboard-teacher"></i>
                  <p>Student Notice Board</p>
                </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('parent/account')}}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('parent/change_password')}}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @endif



          <li class="nav-item ">
            <a href="{{url('logout')}}" class="nav-link @if(Request::segment(2) == 'logout') active @endif">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>

          </li>

        </ul>
      </nav>

    </div>

  </aside>