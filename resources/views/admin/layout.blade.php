@include('partials.header')

    <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>School Management</b></span>
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                <p>Ibrahim Khalil</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i> <span>Setup School</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('admin.year.index') }}"><i class="fa fa-circle-o"></i> Manage Year</a></li>
                  <li><a href="{{ route('admin.month.index') }}"><i class="fa fa-circle-o"></i> Manage Month</a></li>
                  <li><a href="{{ route('admin.class.index') }}"><i class="fa fa-circle-o"></i> Manage Class</a></li>
                  <li><a href="{{ route('admin.book.index') }}"><i class="fa fa-circle-o"></i> Manage Book</a></li>
                  <li><a href="{{ route('admin.exam.index') }}"><i class="fa fa-circle-o"></i> Manage Exam</a></li>

                  <li><a href="{{ route('admin.assign-subject.index') }}"><i class="fa fa-circle-o"></i> Assign Subject</a></li>

                  <li><a href="{{ route('admin.fee-category.index') }}"><i class="fa fa-circle-o"></i> Manage Fee Category </a></li>
                  <li><a href="{{ route('admin.fee-amount.index') }}"><i class="fa fa-circle-o"></i> Manage Fee Amount</a></li>
                  <li><a href="{{ route('admin.designation.index') }}"><i class="fa fa-circle-o"></i> Manage Designation</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i> <span>Manage Student</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('admin.student-registration.index') }}"><i class="fa fa-circle-o"></i> Student Registration</a></li>
                  <li><a href="{{ route('admin.student.promotion') }}"><i class="fa fa-circle-o"></i> Student Promotion</a></li>


                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i> <span>Manage Teacher</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('admin.teacher-registration.index') }}"><i class="fa fa-circle-o"></i> Teacher Registration</a></li>

                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i> <span>Manage Exam Mark</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('admin.mark.create') }}"><i class="fa fa-circle-o"></i> Mark Entry</a></li>
                  <li><a href="{{ route('admin.mark.index') }}"><i class="fa fa-circle-o"></i>Manage Mark</a></li>
                  <li><a href="{{ route('admin.grad-point.index') }}"><i class="fa fa-circle-o"></i>Manage Grad Point</a></li>
                  <li><a href="{{ route('admin.marksheet.index') }}"><i class="fa fa-circle-o"></i>Manage Marksheet</a></li>
                  <li><a href="{{ route('admin.result') }}"><i class="fa fa-circle-o"></i>Manage Result</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i> <span>Accounting</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('admin.student-fee.index') }}"><i class="fa fa-circle-o"></i> Manage Student Fee</a></li>
                  <li><a href="{{ route('admin.teacher-payment.index') }}"><i class="fa fa-circle-o"></i> Teacher Payment</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i> <span>Attendance</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('admin.student-attendance.create') }}"><i class="fa fa-circle-o"></i>Student Attendance</a></li>
                  <li><a href="{{ route('admin.student.attendance.history') }}"><i class="fa fa-circle-o"></i>Student Hisotory</a></li>
                </ul>
              </li>
              <li><a href="{{ route('admin.logout') }}"><i class="fa fa-book"></i> <span>Admin Logout</span></a></li>


            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          @yield('admin-content')
        </div>

        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.2.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </footer>
      </div><!-- ./wrapper -->

      @include('partials.footer')

