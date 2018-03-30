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
                <a class="navbar-brand logo" href="
                @guest
                {{route('index')}}
                @else
                @if(auth()->user()->type == 'FACULTY')
                {{route('dashboard')}}
                @elseif(auth()->user()->type =='HR')
                {{route('hr-dashboard')}}
                @endif
                @endguest
                        "><h3 style="">Guru App</h3></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">

                <ul class="nav navbar-nav">
                    <li>
                        @guest
                            <a class="@yield('active-home')" href="{{route('index')}}">
                                Home
                            </a>
                        @else
                            @if(auth()->user()->type == 'FACULTY')
                                <a class="@yield('active-home')" href="{{route('dashboard')}}">
                                    Home
                                </a>
                            @elseif(auth()->user()->type =='HR')
                                <a class="@yield('active-home')" href="{{route('hr-dashboard')}}">
                                    Home
                                </a>
                            @endif
                        @endguest
                    </li>
                    <li>
                        <a class="@yield('active-jobs')" href="{{route('jobs.index')}}">
                            Job Listings
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li class="right"><a href="{{route('login')}}"><i class="ti-lock"></i> Log In</a></li>
                    @else
                        @if (Auth::user()->type == 'HR')
                            <li>
                                <a href="{{route('jobs.create')}}" class="btn btn-common">
                                    <i class="ti-pencil-alt"></i> Post A Job
                                </a>
                            </li>
                        @endif
                        <li class="">
                            <a class="">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown">

                                <li>
                                    @if (Auth::user()->type == 'FACULTY')
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