	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Scheduling System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent" aria-expanded="false" style="height: 1px;">
				<ul class="navbar-nav mr-auto visible-xs-block">

					<li class="nav-item
						@if( Request::path() == '/' )
							active
						@endif
					">
						<a class="nav-link" href="/createSchedule">Create Schedule
							@if( Request::path() == 'createSchedule' )
								<span class="sr-only">(current)</span>
							@endif
						</a>
					</li>

					<li class="nav-item
						@if( Request::path() == 'viewSchedules' )
							active
						@endif
					">
						<a class="nav-link" href="/viewSchedules">View Schedules
							@if( Request::path() == 'viewSchedules' )
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

					<li class="nav-item
						@if( Request::path() == 'maps' )
							active
						@endif
					">
						<a class="nav-link" href="/maps">Maps
							@if( Request::path() == 'maps' )
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
				</ul>

				<ul class="navbar-nav ml-auto">
					@if (Route::has('login'))
					@auth
					<li class="nav-item">
						<li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            	@php
                            		$user_info = Auth::user()->user_info;
																//dd($user_info)
                            	$name = $user_info->surname . ', ' . $user_info->firstname . ' ' . $user_info->middlename;
                            	@endphp
                                {{ $name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">Login</a>
					</li>
					@endauth
				</div>
				@endif
			</ul>
		</div>
	</div>
</nav>
