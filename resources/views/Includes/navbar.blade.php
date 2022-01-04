<nav class="navbar navbar-expand-lg navbar-light bg-light">
	    <div class="container-fluid">
	    <a class="navbar-brand" href="#">BestBlog</a>
	   

<div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;


 
        <!-- <a class="navbar-brand" href="#">BestBlog</a> -->
        
            <a class="nav-link active navbar-brand" aria-current="page" href="{{url('/')}}">Home</a>
            <a class="nav-link navbar-brand" href="{{url('/posts')}}">Posts</a>
            <a class="nav-link navbar-brand" href="{{url('/users')}}">Users</a>
            <a class="nav-link navbar-brand" href="{{url('/getFriends')}}">Friends</a>
            <a class="nav-link navbar-brand" href="{{url('/getRequests')}}">Requests</a>
            @auth
            <a style="height: 40px;" class="btn btn-primary" href="{{url('/posts/create')}}">Create post</a>
            @endauth





                    </ul>
<!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/dashboard" class="dropdown-item">Dashboard</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    
                </div>



	  </div>
	</nav> 





