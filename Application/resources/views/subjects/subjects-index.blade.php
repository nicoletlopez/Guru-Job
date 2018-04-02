<?php use App\Http\Controllers\JobsController; ?>
<div class="job-alerts-item candidates">
    <h3 class="alerts-title">
        Manage Subjects &nbsp <!--<a class="btn btn-success" href="{{route('subjects.create')}}">Add a Subject</a>-->
        <a href="{{route('subjects.create')}}" data-toggle="tooltip" title="Create Subject"
           style="vertical-align: center">
            <i style="font-size:30px;" class="fa fa-plus-square-o"></i>
        </a>
    </h3>
    <table class="table">
        @if(count($subjects)>0)
            <thead class="">
            <tr>
                <th>Subject Name</th>
                <th style="width:190px;">Schedule</th>
                <th style="width:130px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td><a href="/subjects/{{$subject->id}}"><h3>{{$subject->name}}</h3></a>
                        @if(in_array($subject->id,JobsController::getUsedSubjects()))
                            <p><b>Job:</b> <a href="/jobs/{{$subject->job->id}}">{{$subject->job->title}}</a></p>
                        @endif
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
                    <td>
                        <a href="/subjects/{{$subject->id}}" class="subjectTooltip" title="View Subject">
                            <i style="font-size:30px;" class="ti-eye"></i>
                        </a>
                        <a href="/subjects/{{$subject->id}}/edit" class="subjectTooltip" title="Edit Subject">
                            <i style="font-size:30px;" class="ti-pencil"></i>
                        </a>
                        {!! Form::open(['action'=>['SubjectsController@destroy',$subject->id],'method'=>'POST','class'=>'pull-right']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        <button style="border:none;background-color:transparent;" data-toggle="confirmation" data-placement="left" data-title="{{in_array($subject->id,JobsController::getUsedSubjects()) ? 'Warning! the Job will be deleted':'Are you sure?'}}"
                                type="submit">
                            <i style="font-size:30px;" class="ti-trash"></i>
                        </button>
                        {!! Form::close() !!}

                    </td>
                </tr>
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