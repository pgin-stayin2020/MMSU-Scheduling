
	<div class="col-md-3 ">
		<div class="col-md-12 thumbnail">
			<img src="\images\avatar.png" class="img-fluid " alt="" >
		</div>

		<div class="clearfix"></div>

		<div class="list-group hidden-xs">
			@if(Auth::user())
				@if(Auth::user()->designation == 1)
					<a class="list-group-item {{ Request::path() == '/' ? "active" :  ""}} " href="/">Create Schedule
						@if (Request::path() == '/')
							<span class='sr-only'>(current)</span>
						@endif
					</a>

					<a class="list-group-item {{ Request::path() == 'viewSchedules' ? "active" :  ""}} " href="/viewSchedules">View Schedules
						@if (Request::path() == '/viewSchedules')
							<span class='sr-only'>(current)</span>
						@endif
					</a>

					<a class="list-group-item {{ Request::path() == 'pending_ge' ? "active" :  ""}} " href="/pending_ge">Pending GE Courses
						@if (Request::path() == '/pending_ge')
							<span class='sr-only'>(current)</span>
						@endif
					</a>
	
					<a class="list-group-item {{ Request::path() == 'generateSectionReport' ? "active" :  ""}} " href="/generateSectionReport">Generate Section Report
						@if (Request::path() == '/generateSectionReport')
							<span class='sr-only'>(current)</span>
						@endif
					</a>

					<a class="list-group-item {{ Request::path() == 'generateFacultyReport' ? "active" :  ""}} " href="/generateFacultyReport">Generate Faculty Schedule Report
						@if (Request::path() == '/generateFacultyReport')
							<span class='sr-only'>(current)</span>
						@endif
					</a>

					<a class="list-group-item {{ Request::path() == 'generateRoomReport' ? "active" :  ""}} " href="/generateRoomReport">Generate Room Utilization Report
						@if (Request::path() == '/generateFacultyReport')
							<span class='sr-only'>(current)</span>
						@endif
					</a>

					<a class="list-group-item {{ Request::path() == 'curriculum' ? "active" :  ""}} " href="/curriculum">Curriuclum
						@if (Request::path() == '/curriculum')
							<span class='sr-only'>(current)</span>
						@endif
					</a>
				@elseif(Auth::user()->designation == 2)
					<a class="list-group-item {{ Request::path() == 'view' ? "active" :  ""}} " href="/view">View Schedules
						@if (Request::path() == '/view')
							<span class='sr-only'>(current)</span>
						@endif
					</a>

					<a class="list-group-item {{ Request::path() == 'generateRoomReport' ? "active" :  ""}} " href="/generateRoomReport">Generate Room Utilization Report
						@if (Request::path() == '/generateRoomReport')
							<span class='sr-only'>(current)</span>
						@endif
					</a>
				@elseif(Auth::user()->designation == 3)
					<a class="list-group-item {{ Request::path() == 'view' ? "active" :  ""}} " href="/view">View Schedules
						@if (Request::path() == '/view')
							<span class='sr-only'>(current)</span>
						@endif
					</a>

					<a class="list-group-item {{ Request::path() == 'generateRoomReport' ? "active" :  ""}} " href="/generateRoomReport">Generate Room Utilization Report
						@if (Request::path() == '/generateRoomReport')
							<span class='sr-only'>(current)</span>
						@endif
					</a>
				@endif
			@endif
		</div>
	</div>

{{-- <ul class="navbar-nav mr-auto">

					<li class="nav-item 
						@if( Request::path() == '/' )
							active
						@endif
					">
						<a class="nav-link" href="/">Home
							@if( Request::path() == '/' )
								<span class="sr-only">(current)</span>
							@endif
						</a>
					</li>

					<li class="nav-item
						@if( Request::path() == 'schedules' )
							active
						@endif
					">
						<a class="nav-link" href="/schedules">Schedules
							@if( Request::path() == 'schedules' )
								<span class="sr-only">(current)</span>
							@endif
						</a>
					</li>
					
					<li class="nav-item
						@if( Request::path() == 'curriculum' )
							active
						@endif
					">
						<a class="nav-link" href="/curriculum">Curriculum
							@if( Request::path() == 'curriculum' )
								<span class="sr-only">(current)</span>
							@endif
						</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Dropdown
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
				</ul> --}}