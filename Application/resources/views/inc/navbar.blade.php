<div class="logo-menu">
    <nav class="navbar navbar-default main-navigation" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="{{route('index')}}"><h3 style="">Guru App</h3></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">

                <ul class="nav navbar-nav">
                    <li>
                        <a class="@yield('active-home')" href="{{route('index')}}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="@yield('active-jobs')" href="{{route('jobs')}}">
                            Job Listings
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">



                    @guest
                        <li class="right"><a href="{{route('login')}}"><i class="ti-lock"></i> Log In</a></li>
                    @else
                        @if (Auth::user()->user_type == 'HR')
                        <li>
                            <button class="btn btn-common" data-toggle="modal" data-target=".job-post-form">
                                <i class="ti-pencil-alt"></i> Post A Job
                            </button>
                            @include('jobs.job-post')
                        </li>
                        @endif
                        <li class="">
                            <a href="{{route('dashboard')}}" class="">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown">

                                <li>
                                    @if (Auth::user()->user_type == 'FACULTY')
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    @else
                                        <a href="{{route('hr-dashboard')}}">Dashboard</a>
                                    @endif
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

        @include('inc.mobile-menu')

    </nav>
</div>