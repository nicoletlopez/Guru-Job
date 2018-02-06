<div class="modal fade job-post-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Post a Job</h3>
            </div>
            <div class="modal-body">
                <form class="form-ad">
                    <div class="form-group">
                        <label class="control-label">Job Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Location <span>(optional)</span></label>
                        <input type="text" class="form-control" placeholder="e.g. Manila">
                    </div>
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
                        <label class="control-label" for="textarea">Job Tags <span>(optional)</span></label>
                        <input type="text" class="form-control" placeholder="e.g.PHP,Social Media,Management">
                        <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label">Job Time From:</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select class="dropdown-product selectpicker">
                                    <option>Choose Job Time From</option>
                                </select>
                            </label>
                        </div>
                    </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Job Time To:</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select class="dropdown-product selectpicker">
                                        <option>Choose Job Time To</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                    </div>
                    <textarea></textarea>
                    <div class="form-group">
                        <label class="control-label">Closing Date <span>(optional)</span></label>
                        <input type="text" class="form-control" placeholder="yyyy-mm-dd">
                        <p class="note">Deadline for new applicants.</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-common">Submit your Job</button>
            </div>
        </div>
    </div>
</div>