<div class="job-alerts-item candidates">
    <h3 class="alerts-title">Manage
        Lectures <a href="{{route('lectures.create')}}" class="btn btn-success">Add a Lecture</a></h3>
    @if(count($lectures)>0)
        <table class="table">
            <thead class="">
            <tr>
                <th>Lecture Title</th>
                <th># of Files</th>
                <!--<th>Assigned to</th>-->
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lectures as $lecture)
                <tr>
                    <td><a href="/lectures/{{$lecture->id}}"><h3>{{$lecture->title}}</h3></a></td>
                    <td><p class="badge">{{$lecture->files->count()}}</p></td>
                    <!--<td><p>APC</p></td>-->
                    <td style="width:90px;">
                        <a href="/lectures/{{$lecture->id}}/edit" class="btn btn-primary btn-block">Update</a>
                        {!! Form::open(['action'=>['LecturesController@destroy',$lecture->id],'method'=>'POST']) !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {!! Form::button('Delete',['class'=>'btn btn-danger btn-block','data-toggle'=>'confirmation']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h4>No Lectures.</h4>
    @endif
</div>
@include('inc.prompt-delete')