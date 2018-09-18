@extends('layouts.admin.plane')

@section('body')
    <div id="wrapper">
	
		<div class="container-fluid">
		<div class="d-sm-block d-md-block d-block d-lg-none sidebar-nav">
			<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn">&times;</a>
				<div class="menu-wrap ">
					<ul class="nav" id="side-menu">
						<li {{ (Request::is('/') ? 'class="active"' : '') }}>
							<a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-users fa-fw"></i>Tutor<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/tutor') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/tutor') }}">Tutors View</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-users fa-fw"></i>Employer<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/employer') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/employer') }}">Employer View</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-users fa-fw"></i>Languages<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/language') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/language') }}">Languages View</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-users fa-fw"></i>Certificates<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/certificate') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/certificate') }}">Certificates View</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-users fa-fw"></i>Qualification<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/qualification') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/qualification') }}">Qualification View</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-users fa-fw"></i>jobs<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/job') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/job') }}">jobs View</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
						<li>
							<a href="#"><i class="fa fa-users fa-fw"></i>Addition<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/about/faq') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/about') }}">About View</a>
									<a href="{{ url ('admin/faq') }}">Faq View</a>
								</li>
							</ul>
							<!-- /.nav-second-level -->
						</li>
					</ul>
					
					
				</div>
				
			</div>
			<div class="side-nav-menu row no-gutters">
				<div class="col-xs-6">
					<span class="openbtn" style="font-size:30px;cursor:pointer" >&#9776; </span>
				</div>
				
				<div class="col-xs-6 text-right">
					<div class="logo-wrap-side">
						<img src="https://via.placeholder.com/350x150" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
		</div>
	
	
	
	
		<div class="navbar-default sidebar hidden-xs" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<div class="logo-wrap">
					<img src="https://via.placeholder.com/350x150" class="img-responsive">
				</div>
				<ul class="nav" id="side-menu">
					<li {{ (Request::is('/') ? 'class="active"' : '') }}>
						<a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-users fa-fw"></i>Tutor<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*admin/tutor') ? 'class="active"' : '') }}>
								<a href="{{ url ('admin/tutor') }}">Tutors View</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-users fa-fw"></i>Employer<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*admin/employer') ? 'class="active"' : '') }}>
								<a href="{{ url ('admin/employer') }}">Employer View</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-users fa-fw"></i>Languages<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*admin/language') ? 'class="active"' : '') }}>
								<a href="{{ url ('admin/language') }}">Languages View</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-users fa-fw"></i>Certificates<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*admin/certificate') ? 'class="active"' : '') }}>
								<a href="{{ url ('admin/certificate') }}">Certificates View</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-users fa-fw"></i>Qualification<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*admin/qualification') ? 'class="active"' : '') }}>
								<a href="{{ url ('admin/qualification') }}">Qualification View</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-users fa-fw"></i>jobs<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*admin/job') ? 'class="active"' : '') }}>
								<a href="{{ url ('admin/job') }}">jobs View</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-users fa-fw"></i>Addition<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*admin/about/faq') ? 'class="active"' : '') }}>
								<a href="{{ url ('admin/about') }}">About View</a>
								<a href="{{ url ('admin/faq') }}">Faq View</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>

        <div id="page-wrapper">
			<div class="page-heading-wrap">
				<div class="row">
					<div class="col-md-8">
						<h2 class="dashboard-header">@yield('page_heading')</h2>
					</div>
					<div class="col-md-4 text-right">
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="fa fa-user fa-fw"></i><span>{{\Sentinel::getUser()->first_name}} {{\Sentinel::getUser()->last_name}}</span><i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<a href="{{ url('admin/change_password') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
								</li>
								<li class="divider"></li><li>
									<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="fa fa-sign-out fa-fw"></i> Logout</a>
								</li>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</ul>
						</div>
					</div>
				</div>
				
				
			</div>
            
            <div class="content-part ">
                @yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

