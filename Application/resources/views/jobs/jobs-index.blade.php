<div class="job-alerts-item candidates">
    <h3 class="alerts-title">
        Manage Jobs &nbsp<!--<a class="btn btn-success" href="{{route('jobs.create')}}">Post a Job</a>-->
        <a href="{{route('jobs.create')}}" data-toggle="tooltip" title="Post New Job"
           style="vertical-align: center">
            <i style="font-size:30px; margin: 0;" class="fa fa-plus-square-o"></i>
        </a>
    </h3>
    <table class="table" style="width: 100%">
        <colgroup>
            <col span="1" style="width: 65%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 15%;">
        </colgroup>
        @if(count($jobs)>0)
            <thead class="">
            <tr>
                <th>Job Title</th>
                <th>Number of Applicants</th>
                <th>Applicants</th>
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($jobs as $key=>$job)
                <tr>
                    <td style="vertical-align: middle"><a href="/jobs/{{$job->id}}"><h3>{{$job->title}}</h3></a></td>
                    <td style="text-align: center; vertical-align: middle"><span class="badge">{{$job->applicants->count()}}</span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @if(count($job->applicants) > 0)
                            <a href="/jobs/{{$job->id}}/applicants" data-toggle="tooltip" title="View Applicants">
                                <img src="{{asset('img/view.png')}}" width="40" height="40"/>
                            </a>
                        <!--
                                <div class="can-img">


                                    @foreach($job->applicants as $applicant)
                            <a href="#"><img class="img-circle"
                                             src="{{$applicant->user->profile->picture}}"/></a>
                                    @endforeach

                                </div>
-->
                        @else
                            <p class="text-center">None</p>
                        @endif
                    </td>
                    <td style="vertical-align: middle">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-5">
                                <a href="/jobs/{{$job->id}}/edit" data-toggle="tooltip" title="Update Job">
                                    <img src="{{asset('img/edit.png')}}" width="30" height="30"/>
                                </a>
                            </div>
                            <div class="col-md-6">
                                {!! Form::open(['action'=>['JobsController@destroy',$job->id],'method'=>'POST']) !!}
                                {{ Form::hidden('_method','DELETE') }}
                                <input type="image" src="{{asset('img/delete-icon.png')}}" height="30" width="30"
                                       data-toggle="confirmation" alt="Submit Form" />
                                {{--{!! Form::button('Delete',['class'=>'btn btn-danger btn-block','data-toggle'=>'confirmation']) !!}--}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
                <!--MODAL-->
            @endforeach
            @else
                <h4>No Jobs Posted. <a href="{{route('jobs.create')}}" class="btn btn-common">
                        <i class="ti-pencil-alt"></i> Post A Job
                    </a></h4>

            @endif
            </tbody>
    </table>
</div>
@include('inc.prompt-delete')