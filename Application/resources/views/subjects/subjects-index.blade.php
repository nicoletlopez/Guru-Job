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
                <th>Schedule</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($subjects as $subject)
                <tr>
                    <td><a href="/subjects/{{$subject->id}}"><h3>{{$subject->name}}</h3></a></td>
                    <td>
                        @foreach($subject->schedules as $schedule)
                            <p><b>{{$schedule->day}}</b> {{date("h:i A",strtotime($schedule->start))}} - {{date("h:i A",strtotime($schedule->end))}}</p>
                        @endforeach
                    </td>
                    <td>
                    <!--
                            <a href="/subjects/{{$subject->id}}/edit" class="btn btn-primary">Edit</a>
                            {!! Form::open(['action'=>['SubjectsController@destroy',$subject->id],'method'=>'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
                            -->
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