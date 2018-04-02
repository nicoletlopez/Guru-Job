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
            <thead>
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
                    <td style="text-align: center; vertical-align: middle"><span
                                class="badge">{{$job->applicants->count()}}</span></td>
                    <td style="text-align: center; vertical-align: middle">
                        @if(count($job->applicants)>0)
                            <a href="/jobs/{{$job->id}}/applicants" class="jobTooltip" title="View Applicants">
                                <span class="ti-eye" style="font-size: 35px"></span>
                            </a>
                        @else
                            <p>None</p>
                        @endif
                    </td>
                    <td style="vertical-align: middle">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-5">
                                <a href="/jobs/{{$job->id}}/edit" class="jobTooltip" title="Update Job">
                                    <span class="ti-pencil" style="font-size: 35px"></span>
                                </a>
                            </div>
                            <div class="col-md-6">
                                {!! Form::open(['action'=>['JobsController@destroy',$job->id],'method'=>'POST']) !!}
                                {{ Form::hidden('_method','DELETE') }}
                                <button style="border:none;background-color:transparent;" data-toggle="confirmation"
                                        type="submit">
                                    <i style="font-size:30px;" class="ti-trash"></i>
                                </button>{!! Form::close() !!}
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
<script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('self/js/tooltips.js')}}"></script>
@include('inc.prompt-delete')