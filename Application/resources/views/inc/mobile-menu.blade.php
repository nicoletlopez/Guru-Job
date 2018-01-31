<ul class="wpb-mobile-menu">
    <li>
        <a href="{{route('index')}}">Home</a>
    </li>
    <!--<li class="btn-m"><a href="post-job.html"><i class="ti-pencil-alt"></i> Post A Job</a></li>-->
    @guest
        <li class="btn-m"><a class="active" href="{{route('login')}}"><i class="ti-lock"></i> Log In</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
               aria-haspopup="true">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
        </li>
    @endguest
</ul>