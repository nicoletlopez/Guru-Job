<div class="job-alerts-item candidates">
    <h3 class="alerts-title">My Resumes <a class="btn btn-success" href="{{route('resumes.create')}}">Create a Resume</a></h3>
    <hr/>
    <div class="row">
        @foreach($resumes as $resume)
        <div class="col-md-3">
            <a href="/resumes/{{$resume->id}}/{{$resume->template}}">
                This is resume #{{$resume->id}}, meow meow meow
            </a>
        </div>
        @endforeach
    </div>
</div>
@include('inc.prompt-delete')