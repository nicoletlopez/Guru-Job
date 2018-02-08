<div class="modal fade job-post-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Post a Job</h3>
            </div>
            {!! Form::open(['action'=>'JobsController@store','class'=>'form-ad','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="modal-body">

                <div class="form-group">
                    {{Form::label('title','Job Title',['class'=>'control-label'])}}
                    {{Form::text('title','',['class'=>'form-control'])}}
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label">Location <span>(optional)</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Manila">
                </div>
                -->
                <div class="form-group">
                    {{Form::label('type','Job Type',['class'=>'control-label'])}}
                    <div class="radio">
                        <label style="color:black;">{{Form::radio('type','',['type'=>"radio"])}}Full-Time</label>
                    </div>
                    <div class="radio">
                        <label style="color:black;">{{Form::radio('type','',['type'=>"radio"])}}Part-Time</label>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label">Specialization</label>
                    <div class="search-category-container">
                        <label class="styled-select">
                            <select class="dropdown-product selectpicker">
                                <option>All Specializations</option>
                                <option>Finance</option>
                                <option>IT & Engineering</option>
                                <option>Education/Training</option>
                                <option>Art/Design</option>
                                <option>Sale/Markting</option>
                                <option>Healthcare</option>
                                <option>Science</option>
                                <option>Food Services</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Subjects <span>(optional)</span></label>
                    <input type="text" class="form-control" placeholder="e.g.PHP,Social Media,Management">
                    <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
                </div>
                -->
                <div class="form-group">
                    {{Form::label('subject','Subject/s',['class'=>'control-label'])}}
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day','',['type'=>"checkbox"])}}subjects</label>
                    </div>

                </div>
                <div class="form-group">
                    {{Form::label('day','Work Days',['class'=>'control-label'])}}
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day[]','Mon',['type'=>"checkbox"])}}Monday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day[]','Tue',['type'=>"checkbox"])}}Tuesday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day[]','Wed',['type'=>"checkbox"])}}Wednesday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day[]','Thu',['type'=>"checkbox"])}}Thursday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day[]','Fri',['type'=>"checkbox"])}}Friday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day[]','Sat',['type'=>"checkbox"])}}Saturday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('day[]','Sun',['type'=>"checkbox"])}}Sunday</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {{Form::label('time-from','Job Time From:',['class'=>'control-label'])}}
                        {{Form::time('time-from','',['class'=>'form-control'])}}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('time-to','Job Time To:',['class'=>'control-label'])}}
                        {{Form::time('time-to','',['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('salary','Salary (PHP)',['class'=>'control-label'])}}
                    {{Form::number('salary','',['min'=>'1','class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description','Description',['class'=>'control-label'])}}
                    {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Job Description'])}}
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label">Closing Date <span>(optional)</span></label>
                    <input type="text" class="form-control" placeholder="yyyy-mm-dd">
                    <p class="note">Deadline for new applicants.</p>
                </div>
                -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{Form::submit('Post your Job',['class'=>'btn btn-common'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <a href="
</div>