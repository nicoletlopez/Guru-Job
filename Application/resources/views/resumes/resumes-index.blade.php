<link rel="stylesheet" href="{{asset('self/css/iframe-thumb.css')}}" type="text/css"/>
<div class="job-alerts-item candidates">
    <h3 class="alerts-title">
        My Resumes&nbsp
        <a href="{{route('resumes.create')}}" data-toggle="tooltip" title="Create Resume"
           style="vertical-align: center">
            <i style="font-size:30px; margin: 0;" class="fa fa-plus-square-o"></i>
        </a>
    </h3>
    <hr/>
    @if(count($resumes)>0)
        <div class="row">
            @foreach($resumes as $resume)
                <div class="col-md-4">
                    <a target="_blank" href="/resumes/{{$resume->id}}/{{$resume->template}}">
                    <div class="thumbnail-container">
                        <div class="thumbnail">
                            <iframe src="/resumes/{{$resume->id}}/{{$resume->template}}" frameborder="0"
                                    onload="this.style.opacity = 1"></iframe>
                        </div>
                    </div>
                    </a>
                    <b>Last Edited at:</b>
                    <p>{{DateTime::createFromFormat('Y-m-d H:i:s',$resume->updated_at)->format('F j, Y \a\t h:i a')}}</p>
                    <div style="width:60%" class="row">
                        <div class="col-md-3 col-xs-3">
                            <a class="" target="_blank" href="/resumes/{{$resume->id}}/{{$resume->template}}">
                                <i style="font-size:30px;" class="ti-eye"></i>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <a class="" href="/resumes/{{$resume->id}}/edit" title="Edit Resume">
                                <i style="font-size:30px;" class="ti-pencil"></i>
                            </a>
                        </div>
                        <!--
                        <div class="col-md-3 col-xs-3">

                            <a class="" href="#" title="Download PDF">
                                <i style="font-size:30px;" class="ti-download"></i>
                            </a>

                        </div>

                        -->
                        <div class="col-md-3 col-xs-3">
                            {!! Form::open(['action'=>['ResumesController@destroy',$resume->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            <button style="border:none;background-color:transparent;" data-toggle="confirmation"
                                    type="submit">
                                <i style="font-size:30px;" class="ti-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <hr/>
                </div>
            @endforeach
        </div>
    @else
        <h4>No Resumes.</h4>
    @endif
</div>
@include('inc.prompt-delete')