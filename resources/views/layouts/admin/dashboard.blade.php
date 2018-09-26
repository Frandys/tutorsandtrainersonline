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
							<a href="#"><i class="fa fa-users fa-fw"></i>Countries<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li {{ (Request::is('*admin/countries') ? 'class="active"' : '') }}>
									<a href="{{ url ('admin/countries') }}">Countries View</a>
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

				<div class="panel-group" id="accordionMenu" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<i class="fa fa-users fa-fw"></i>Tutor<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="{{ url ('admin/tutor') }}">Tutors View</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<i class="fa fa-users fa-fw"></i>Employer<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse {{ (Request::is('*admin/employer') ? 'in' : '') }}" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="{{ url ('admin/employer') }}">Employer View</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading3">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
									<i class="fa fa-users fa-fw"></i>Languages<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapse3" class="panel-collapse collapse  {{ (Request::is('*admin/language') ? 'in' : '') }}" role="tabpanel" aria-labelledby="heading3">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="{{ url ('admin/language') }}">Languages View</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading4">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
									<i class="fa fa-users fa-fw"></i>Certificates<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapse4" class="panel-collapse collapse  {{ (Request::is('*admin/certificate') ? 'in' : '') }}" role="tabpanel" aria-labelledby="heading4">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="{{ url ('admin/certificate') }}">Certificates View</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading5">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
									<i class="fa fa-users fa-fw"></i>Qualification<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapse5" class="panel-collapse collapse  {{ (Request::is('*admin/qualification') ? 'in' : '') }}" role="tabpanel" aria-labelledby="heading5">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="{{ url ('admin/qualification') }}">Qualification View</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading6">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
									<i class="fa fa-users fa-fw"></i>Countries<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapse6" class="panel-collapse collapse  {{ (Request::is('*admin/countries') ? 'in' : '') }}" role="tabpanel" aria-labelledby="heading6">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="{{ url ('admin/countries') }}">Countries</a></li>
								</ul>
							</div>
						</div>
					</div>


					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading6">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
									<i class="fa fa-users fa-fw"></i>jobs<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapse6" class="panel-collapse collapse  {{ (Request::is('*admin/job') ? 'in' : '') }}" role="tabpanel" aria-labelledby="heading6">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="{{ url ('admin/job') }}">jobs View</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading7">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
									<i class="fa fa-users fa-fw"></i>Addition<span class="fa arrow"></span>
								</a>
							</h4>
						</div>
						<div id="collapse7" class="panel-collapse collapse {{ (Request::is('*admin/about/faq') ? 'in' : '') }}" role="tabpanel" aria-labelledby="heading7">
							<div class="panel-body">
								<ul class="nav">
									<li>
										<a href="{{ url ('admin/about') }}">About View</a>
									</li>
									<li>
										<a href="{{ url ('admin/faq') }}">Faq View</a>
									</li>
								</ul>
							</div>
						</div>
					</div>


				</div>

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

