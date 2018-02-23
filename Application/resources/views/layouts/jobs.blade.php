<section class="find-job section">

    <div class="container">
<br/>
        <h2 class="section-title">Jobs</h2>
        <div class="row">
            <div class="col-md-12">
                @if(count($jobs)>0)
                @foreach($jobs as $job)
                <div class="job-list">
                    <div class="thumb">
                        <a href="/jobs/{{$job->id}}"><img width="100" height="" src="{{$job->hr->user->profile->picture}}" alt=""></a>
                    </div>
                    <div class="job-list-content">
                        <h4><a href="/jobs/{{$job->id}}">{{$job->title}}</a>
                            @if($job->type == 'FT')
                                <span class="full-time">Full-Time</span>
                            @else
                                <span class="part-time">Part-Time</span>
                            @endif
                        </h4>
                        <p>{!! $job->desc !!}</p>
                        <div class="job-tag">
                            <div class="pull-left">
                                <div class="meta-tag">
                                    <!--<span><a href="#"><i class="ti-brush"></i>Art/Design</a></span>-->
                                    <span><i class="ti-location-pin"></i>{{$job->hr->user->profile->street_address}}, {{$job->hr->user->profile->city}}</span>
                                    {{--<span><i class="ti-time"></i>timeFrom - timeTo</span>--}}
                                    <span><i class="ti-world"></i>{{$job->workDays()}}</span>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="icon">
                                    <i class="ti-heart"></i>
                                </div>
                                <a href="/jobs/{{$job->id}}" class="btn btn-common btn-rm">More Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    {!! $jobs->render() !!}
                @else
                    <h3>No Jobs Found.</h3>
                @endif
            </div>
        </div>
    </div>
</section>