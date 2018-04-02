<?php use App\Http\Controllers\JobsController; ?>
@extends('base')
@section('title')- Job Details @endsection
@section('current') Job Details @endsection
@section('current-header') Job Details @endsection
@section('active-jobs') active @endsection

@section('content')

    @include('inc.header')
    <section class="job-detail section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">Job Information</h2>
                        <div class="box">
                            <div class="text-left">
                                <h3>{{$job->title}}</h3>
                                <p>
                                    @if($job->type == 'FT')
                                        <span class="full-time">Full-Time</span>
                                    @else
                                        <span class="part-time">Part-Time</span>
                                    @endif
                                </p>
                                <div class="meta">
                                    <span><i class="ti-location-pin"></i>{{$job->hr->user->profile->street_address}}
                                        , {{$job->hr->user->profile->city}}</span>
                                    <!--<span><a href="#"><i class="ti-calendar"></i> Dec 30, 2017 - Feb 20, 2018</a></span>-->

                                </div>
                                <div class="meta">
                                    <span><i class="ti-mobile"></i>{{$job->hr->user->profile->contact_number}}</span>
                                </div>
                                <div class="meta">
                                    <span><i class="ti-world"></i>{{$job->workDays()}}</span>
                                </div>
                                <strong class="price"><i class="fa fa-money"></i>P{{$job->floor_salary}}
                                    - {{$job->ceiling_salary}} /
                                    @if($job->type == 'FT')
                                        Month
                                    @else
                                        Hour
                                    @endif
                                </strong>
                                <!--TOP BUTTON-->
                                @guest
                                    <a href="{{route('login')}}" class="btn btn-common btn-sm">Login to Apply</a>
                                @else

                                    @if(Auth::user()->type == 'FACULTY')
                                        @if(in_array($job->id,JobsController::getFacultyJobs()))
                                            <p class="alert alert-success">You've already applied for this job</p>
                                        @else
                                            {!! Form::open(['action'=>'ApplicationsController@store','id'=>'apply','method'=>'post']) !!}
                                            {{Form::hidden('job-id',$job->id)}}
                                            {{Form::submit('Apply for this Job',['class'=>'btn btn-common btn-sm'])}}
                                        <!--<a href="#" class="btn btn-common btn-sm">Apply For This Job</a>-->
                                            {!! Form::close() !!}
                                        @endif
                                    @else
                                        @if(Auth::user()->id == $job->hr_id)
                                            <a href="/jobs/{{$job->id}}/edit" class="btn btn-primary btn-sm">Update
                                                Job</a>
                                            <a href="{{route('manage-jobs')}}" class="btn btn-success btn-sm">Manage
                                                Jobs</a>
                                        @endif
                                    @endif
                                @endguest
                            </div>
                            <div class="clearfix">
                                <h4>Overview</h4>
                                <p>
                                    {!! $job->desc !!}
                                </p>
                                <h4>Subject and Schedule</h4>
                                @if($subject)
                                    <table class="table" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Specialization/s</th>
                                            <th>Schedule</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$subject->name}}</td>
                                            <td>
                                                <ol>
                                                    @foreach($subject->specializations as $specialization)
                                                        <li>{{$specialization->name}}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>
                                                <table>
                                                    @foreach($subject->schedules as $schedule)
                                                        <tr>
                                                            <td><b>{{$schedule->day}}</b></td>
                                                            <td>&nbsp;</td>
                                                            <td>{{date("h:i A",strtotime($schedule->start))}}</td>
                                                            <td>-</td>
                                                            <td>{{date("h:i A",strtotime($schedule->end))}}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <p>No Subjects Listed.</p>
                                @endif

                                <h4>Subject Description</h4>
                                <p>
                                    {!! $subject->desc !!}
                                </p>
                            <!--
                                <h4>Overview</h4>
                                <p>LemonKids LLC. In marketing communications, we dream it and create it. All of the company’s promotional and communication needs are completed in-house by these “creatives” in an advertising agency-based set-up. This includes everything from advertising, promotions and print production to media relations, exhibition coordination and website maintenance. Everyone from artists, writers, designers, media buyers, event coordinators, video producers/editors and public relations specialists work together to bring campaigns and product-centric promotions to life.</p>
                                <p>If you’re a dreamer, gather up your portfolio and show us your vision. Garmin is adding one more enthusiastic individual to our in-house Communications expert team.</p>
                                <h4>Qualification</h4>
                                <p>Minimum of 5 years creative experience in a graphic design studio or advertising ad agency environment is required. Qualified candidates for this role will possess the following education, experience and skills:</p>
                                <ul>
                                    <li><i class="ti-check-box"></i>Demonstrated strong and effective verbal, written, and interpersonal communication skills</li>
                                    <li><i class="ti-check-box"></i>Must be team-oriented, possess a positive attitude and work well with others</li>
                                    <li><i class="ti-check-box"></i>Ability to prioritize and multi-task in a flexible, fast paced and challenging environment</li>
                                </ul>
                                <h4>Key responsibilities also include</h4>
                                <ul>
                                    <li><i class="ti-check-box"></i>Provide technical health advice to Head of Country Programmes and field advisors at all key stages of the project management cycle including needs assessment.</li>
                                    <li><i class="ti-check-box"></i>Technical strategy and design, implementation as well as sector specific monitoring and evaluation.</li>
                                    <li><i class="ti-check-box"></i>This includes travel to field programmes as well as review of proposals, key reports and surveys prior to external submission.</li>
                                    <li><i class="ti-check-box"></i>Stay abreast of current best practice. Research and stay informed on academic and technical health and nutrition issues, techniques, and guidelines to inform and improve programming.</li>
                                </ul>
                                <h4>Requirements</h4>
                                <ul>
                                    <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.</li>
                                    <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.
                                        Strongly prefer candidates with High School Diploma</li>
                                    <li><i class="ti-check-box"></i>Must be able to perform physical activities that require considerable use of your arms and legs and moving your whole body, such as climbing, lifting, balancing, walking, stooping, and handling of materials.</li>
                                </ul>
                                <h4>Benefits</h4>
                                <ul>
                                    <li><i class="ti-check-box"></i>Must have minimum of 3 years experience running, maneuvering, driving, and navigating equipment such as bulldozer, excavators, rollers, and front-end loaders.</li>
                                    <li><i class="ti-check-box"></i>Strongly prefer candidates with High School Diploma</li>
                                    <li><i class="ti-check-box"></i>Must be able to perform physical activities that require considerable use of your arms and legs and moving your whole body, such as climbing, lifting, balancing, walking, stooping, and handling of materials.</li>
                                </ul>
                                -->
                                @guest
                                    <a href="{{route('login')}}" class="btn btn-common">Login to Apply</a>
                                @else
                                    @if(Auth::user()->type == 'FACULTY')
                                        @if(in_array($job->id,JobsController::getFacultyJobs()))

                                        @else
                                            <a href="{{ route('jobs.store') }}" class="btn btn-common"
                                               onclick="event.preventDefault();
                                                     document.getElementById('apply').submit();">
                                                Apply for this Job Now
                                            </a>
                                        @endif
                                    @else
                                        @if(Auth::user()->id == $job->hr_id)
                                            <a href="/jobs/{{$job->id}}/edit" class="btn btn-primary">Update Job</a>
                                            <a href="{{route('manage-jobs')}}" class="btn btn-success">Manage
                                                Jobs</a>
                                        @endif
                                    @endif
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <aside>
                        <div class="sidebar">
                            <h2 class="medium-title">School Details</h2>
                            <div class="box">
                                <div class="img-thumbnail">
                                    <img class="img-responsive" src="{{$job->hr->user->profile->picture}}" alt="img">
                                </div>
                                <div class="text-box">
                                    <h4>{{$job->hr->user->name}}</h4>
                                    <p>{!! $job->hr->user->profile->description !!}
                                    </p>
                                    <!--
                                    <strong>Industry</strong>
                                    <p>Insurance</p>
                                    <strong>Type of Business Entity</strong>
                                    <p>Sole Proprietorship</p>
                                    <strong>Established In</strong>
                                    <p>01 January, 2000</p>
                                    <strong>No. of Employees</strong>
                                    <p>105</p>
                                    -->
                                    <strong>Established on</strong>
                                    <p> {{$date}}</p>
                                    <strong>Location</strong>
                                    <p>{{$job->hr->user->profile->street_address}}
                                        , {{$job->hr->user->profile->city}} </p>
                                    <strong>Contact No.</strong>
                                    <p>{{$job->hr->user->profile->contact_number}}</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection