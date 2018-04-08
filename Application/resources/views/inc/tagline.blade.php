<div class="row">
    <div class="col-md-12">
        <h1 style="text-align: center">More Opportunities</h1>
        <br/>
        <h1 style="text-align: center">for Filipino Instructors</h1>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br/>
            <div class="center">
                @guest
                    <a href="{{route('jobs.index')}}" class="btn btn-success">Search Jobs</a>
                    <a href="{{route('register')}}" class="btn btn-primary">Register for Free</a>
                @else
                    <a href="{{route('jobs.index')}}" class="btn btn-success">Search Jobs</a>
                @endguest
            </div>
        </div>
    </div>
</div>
