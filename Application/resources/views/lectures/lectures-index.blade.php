<div class="job-alerts-item candidates">
    <h3 class="alerts-title">
        Manage Lectures&nbsp
        <a href="{{route('lectures.create')}}" data-toggle="tooltip" title="Add Lecture"
        style="vertical-align: center">
            <i style="font-size:30px; margin: 0;" class="fa fa-plus-square-o"></i>
        </a>
    </h3>
    @if(count($lectures)>0)
        <table class="table" style="width: 100%">
            <colgroup>
                <col span="1" style="width: 70%;">
                <col span="1" style="width: 15%;">
                <col span="1" style="width: 15%;">
            </colgroup>
            <thead class="">
            <tr>
                <th>Lecture Title</th>
                <th>Number of Files</th>
                <!--<th>Assigned to</th>-->
                <th style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lectures as $lecture)
                <tr>
                    <td style="vertical-align: middle"><a href="/lectures/{{$lecture->id}}"><h3>{{$lecture->title}}</h3></a></td>
                    <td style="text-align: center; vertical-align: middle"><p class="badge">{{$lecture->files->count()}}</p></td>
                    <!--<td><p>APC</p></td>-->
                    <td style="vertical-align: middle;">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-5">
                                <a href="/lectures/{{$lecture->id}}/edit" data-toggle="tooltip" title="Edit Lecture">
                                    <img src="{{asset('img/edit.png')}}" width="30" height="30"/>
                                </a>
                            </div>
                            <div class="col-md-6">
                                {!! Form::open(['action'=>['LecturesController@destroy',$lecture->id],'method'=>'POST']) !!}
                                {{ Form::hidden('_method','DELETE') }}
                                <input type="image" src="{{asset('img/delete-icon.png')}}" height="30" width="30"
                                       data-toggle="confirmation" alt="Submit Form" />
                                {{--{!! Form::button('Delete',['class'=>'btn btn-danger btn-block','data-toggle'=>'confirmation']) !!}--}}
                                {!! Form::close() !!}
                            </div>
                        </div>
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