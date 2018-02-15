@extends('faculty.dashboard-menu')
@section('title')- Bookmarked Jobs @endsection
@section('current') Bookmarked Jobs @endsection
@section('current-header') Bookmarked Jobs @endsection
@section('bookmarked-jobs-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item">
        <h3 class="alerts-title">Bookmarked Jobs</h3>
        <div class="job-list">
            <div class="thumb">
                <a href="#"><img src="{{asset('img/jobs/img-1.jpg')}}" alt=""></a>
            </div>
            <div class="job-list-content">
                <h4><a href="#">We need a web designer</a><span class="full-time">Full-Time</span></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                <div class="job-tag">
                    <div class="pull-left">
                        <div class="meta-tag">
                            <span><a href="browse-categories.html"><i class="ti-brush"></i>Art/Design</a></span>
                            <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                            <span><i class="ti-time"></i>60/Hour</span>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="icon">
                            <i class="ti-heart"></i>
                        </div>
                        <div class="btn btn-common btn-rm">More Detail</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-list">
            <div class="thumb">
                <a href="#"><img src="{{asset('img/jobs/img-2.jpg')}}" alt=""></a>
            </div>
            <div class="job-list-content">
                <h4><a href="#">Front-end developer needed</a><span class="full-time">Full-Time</span></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                <div class="job-tag">
                    <div class="pull-left">
                        <div class="meta-tag">
                            <span><a href="browse-categories.html"><i class="ti-desktop"></i>Technologies</a></span>
                            <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                            <span><i class="ti-time"></i>60/Hour</span>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="icon">
                            <i class="ti-heart"></i>
                        </div>
                        <div class="btn btn-common btn-rm">More Detail</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-list">
            <div class="thumb">
                <a href="#"><img src="{{asset('img/jobs/img-3.jpg')}}" alt=""></a>
            </div>
            <div class="job-list-content">
                <h4><a href="#">Software Enginner</a><span class="part-time">Part-Time</span></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                <div class="job-tag">
                    <div class="pull-left">
                        <div class="meta-tag">
                            <span><a href="browse-categories.html"><i class="ti-desktop"></i>Technologies</a></span>
                            <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                            <span><i class="ti-time"></i>60/Hour</span>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="icon">
                            <i class="ti-heart"></i>
                        </div>
                        <div class="btn btn-common btn-rm">More Detail</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-list">
            <div class="thumb">
                <a href="#"><img src="{{asset('img/jobs/img-4.jpg')}}" alt=""></a>
            </div>
            <div class="job-list-content">
                <h4><a href="#">Fullstack web developer needed</a><span class="full-time">Full-Time</span></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quaerat aut veniam molestiae atque dolorum omnis temporibus consequuntur saepe. Nemo atque consectetur saepe corporis odit in dicta reprehenderit, officiis, praesentium?</p>
                <div class="job-tag">
                    <div class="pull-left">
                        <div class="meta-tag">
                            <span><a href="browse-categories.html"><i class="ti-desktop"></i>Technologies</a></span>
                            <span><i class="ti-location-pin"></i>Cupertino, CA, USA</span>
                            <span><i class="ti-time"></i>60/Hour</span>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="icon">
                            <i class="ti-heart"></i>
                        </div>
                        <div class="btn btn-common btn-rm">More Detail</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection