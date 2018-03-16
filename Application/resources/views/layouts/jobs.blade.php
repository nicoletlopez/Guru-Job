<section class="find-job section">

    <div class="container">
        <br/>
        <div class="row">
            <div class="col-md-4">
                <div class="well">
                    {!! Form::open(['route'=>'search','method'=>'GET']) !!}
                    <h3>Search Criteria</h3>
                    <br/>
                    {{--Search Term--}}
                    <div class="form-group">
                        {{Form::label('search-term-label', 'Search Term')}}
                        {{Form::text('search-term','',['class'=>'form-control','placeholder'=>'job title/keywords'])}}
                    </div>
                    <div class="form-group">
                        <div class="search-category-container">
                            {{Form::label('region-label', 'Select Region')}}
                            {{Form::select('region',
                            [null=>'All Regions',
                            'NCR'=>'National Capital Region',
                            'R1'=>'Ilocos Region',
                            'CAR'=>'Cordillera Administrative Region',
                            'R2'=>'Cagayan Valley',
                            'R3'=>'Central Luzon',
                            'R4A'=>'CALABARZON',
                            'R4B'=>'MIMAROPA',
                            'R5'=>'Bicol Region',
                            'R6'=>'Western Visayas',
                            'R7'=>'Central Visayas',
                            'R8'=>'Eastern Visayas',
                            'R9'=>'Zamboanga Peninsula',
                            'R10'=>'Northern Mindanao',
                            'R11'=>'Davao Region',
                            'R12'=>'SOCCKSARGEN',
                            'R13'=>'Caraga Region',
                            'ARMM'=>'Autonomous Region in Muslim Mindanao',],
                            null,
                            ['class'=>'dropdown-product selectpicker', 'style'=>'height:40px !important;'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="search-category-container">
                            {{Form::label('specialization-label', 'Select Specialization')}}
                            {{Form::select('specialization',
                            [null=>'All Specializations',
                            'JAVA'=>'Java',
                            'DATA'=>'Data Networks',
                            'EMB'=>'Embedded Networks',],
                            null,
                            ['class'=>'dropdown-product selectpicker'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="search-category-container">
                            {{Form::label('work-day-label', 'Select Work Day')}}
                            {{Form::select('free-day',
                            [null=>'All Days',
                            'SUN'=>'Sunday',
                            'MON'=>'Monday',
                            'TUE'=>'Tuesday',
                            'WED'=>'Wednesday',
                            'THU'=>'Thursday',
                            'FRI'=>'Friday',
                            'SAT'=>'Saturday'],
                            null,
                            ['class'=>'dropdown-product selectpicker'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                {{Form::label('work-time-from-label', 'Work Time From')}}
                                {{Form::time('start-time','',['class'=>'form-control','step'=>'900'])}}
                            </div>
                            <div class="col-md-6">
                                {{Form::label('work-time-to-label', 'Work Time Too')}}
                                {{Form::time('end-time','',['class'=>'form-control','step'=>'900'])}}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-common btn-block">Search</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="section-title">Jobs</h2>
                @if(count($jobs)>0)
                    @foreach($jobs as $job)
                        <div class="job-list">
                            <div class="thumb">
                                <a href="/jobs/{{$job->id}}"><img width="100" height=""
                                                                  src="{{$job->hr->user->profile->picture}}" alt=""></a>
                            </div>
                            <div class="job-list-content">
                                <h4><a href="/jobs/{{$job->id}}">{{$job->title}}</a>
                                    @if($job->type == 'FT')
                                        <span class="full-time">Full-Time</span>
                                    @else
                                        <span class="part-time">Part-Time</span>
                                    @endif
                                </h4>
                                Posted by <span style="font-weight:bold;"
                                                class="text-primary">{{$job->hr->user->name}}</span>
                                <p>{!! str_limit($job->desc,500,'...') !!}</p>
                                <div class="job-tag">
                                    <div class="pull-left">
                                        <div class="meta-tag">
                                            <!--<span><a href="#"><i class="ti-brush"></i>Art/Design</a></span>-->
                                            <span><i class="ti-location-pin"></i>{{$job->hr->user->profile->street_address}}
                                                , {{$job->hr->user->profile->city}}</span>
                                            {{--<span><i class="ti-time"></i>timeFrom - timeTo</span>--}}
                                            <span><i class="ti-world"></i>{{$job->jobSchedules()}}</span>
                                        </div>
                                    </div>
                                    <div class="pull-right">
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