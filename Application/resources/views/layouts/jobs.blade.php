<section class="find-job section">
    <div class="container">
        <br/>
        <div class="row">
            <div class="col-md-4">
                @include('inc.searchSidebar')
            </div>
            <div class="col-md-8">
                <h2 class="section-title">Jobs</h2>
                @if(count($jobs)>0)
                    @foreach($jobs as $job)
                        <div class="job-list col-md-12">
                            <div class="thumb">
                                <a href="/jobs/{{$job->id}}"><img width="100" height=""
                                                                  src="{{$job->hr->user->profile->picture}}" alt=""></a>
                            </div>
                            <div class="job-list-content">
                                <h4><a href="/jobs/{{$job->id}}">{{$job->title}}</a></h4>
                                <p>
                                    @if($job->type == 'FT')
                                        <span class="full-time">Full-Time</span>
                                    @else
                                        <span class="part-time">Part-Time</span>
                                    @endif
                                </p>
                                Posted by <span style="font-weight:bold;color:#FC4A1A"
                                                class="text-primary">{{$job->hr->user->name}}</span>
                                <p>{!! str_limit($job->desc,400,'...') !!}</p>
                                <div class="job-tag">
                                    <div class="pull-left col-md-9">
                                        <div class="meta-tag" style="word-wrap:break-word;">
                                            <!--<span><a href="#"><i class="ti-brush"></i>Art/Design</a></span>-->
                                            <span><i class="ti-location-pin"></i>{{$job->hr->user->profile->street_address}}
                                                , {{$job->hr->user->profile->city}}</span>
                                            <br/>
                                            {{--<span><i class="ti-time"></i>timeFrom - timeTo</span>--}}
                                            <span><i class="ti-world"></i>{{$job->jobSchedules()}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="/jobs/{{$job->id}}" class="btn btn-common btn-rm">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if(Request::is('jobs'))
                        {!! $jobs->render() !!}
                    @elseif(Request::is('/'))
                        <a href="{{route('jobs.index')}}" class="btn btn-common">Show more jobs</a>
                    @endif
                @else
                    <h3>No Jobs Found.</h3>
                @endif
            </div>
        </div>
    </div>
    <br/>
</section>