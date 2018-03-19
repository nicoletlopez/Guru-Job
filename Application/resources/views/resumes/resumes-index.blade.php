<div class="job-alerts-item candidates">
    <h3 class="alerts-title">My Resumes <a class="btn btn-success" href="{{route('resumes.create')}}">Create a Resume</a></h3>
    <hr/>
    <div class="row">
        <div class="col-md-3">
            <a href="#" class="thumbnail">
                <img src="{{asset('img/resume/resume0.png')}}">
            </a>
        </div>
        <div class="col-md-3">
            <a href="#" class="thumbnail">
                <img src="{{asset('img/resume/resume1.png')}}">
            </a>
        </div>
    </div>
</div>
@include('inc.prompt-delete')