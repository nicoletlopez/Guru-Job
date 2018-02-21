@extends('hr.dashboard-menu')
@section('title')- Manage Applications @endsection
@section('current') Manage Applications @endsection
@section('current-header') Manage Applications @endsection
@section('manage-applications-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Manage applications</h3>
        <div class="alerts-list">
            <div class="row">
                <div class="col-md-5">
                    <p>Job Title</p>
                </div>
                <div class="col-md-2">
                    <p>Applicant</p>
                </div>
                <div class="col-md-2">
                    <p>Date Applied</p>
                </div>
                <div class="col-md-3">
                    <p>Resume</p>
                </div>
            </div>
        </div>
        @foreach($applicants as $applicant)
            <div class="applications-content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="thums">
                            <img src="{{asset('img/jobs/img-1.jpg')}}" alt="">
                        </div>
                        <h3>{{$applicant->pivot}}</h3>
                        <span>Quick Studio</span>
                    </div>
                    <div class="col-md-2">
                        <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p>Nov 14th, 2017</p>
                    </div>
                    <div class="col-md-3">
                        <p>Resume.docx</p>
                    </div>
                </div>
            </div>
        @endforeach
            {{--<div class="applications-content">
                 <div class="row">
                     <div class="col-md-5">
                         <div class="thums">
                             <img src="{{asset('img/jobs/img-1.jpg')}}" alt="">
                         </div>
                         <h3>Front-end developer needed</h3>
                         <span>Quick Studio</span>
                     </div>
                     <div class="col-md-2">
                         <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
                     </div>
                     <div class="col-md-2">
                         <p>Nov 14th, 2017</p>
                     </div>
                     <div class="col-md-3">
                         <p>Resume.docx</p>
                     </div>
                 </div>
             </div>
             <div class="applications-content">
                 <div class="row">
                     <div class="col-md-5">
                         <div class="thums">
                             <img src="{{asset('img/jobs/img-1.jpg')}}" alt="">
                         </div>
                         <h3>We're looking for an Art Director</h3>
                         <span>Quick Studio</span>
                     </div>
                     <div class="col-md-2">
                         <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
                     </div>
                     <div class="col-md-2">
                         <p>Nov 14th, 2017</p>
                     </div>
                     <div class="col-md-3">
                         <p>Resume.docx</p>
                     </div>
                 </div>
             </div>
             <div class="applications-content">
                 <div class="row">
                     <div class="col-md-5">
                         <div class="thums">
                             <img src="{{asset('img/jobs/img-1.jpg')}}" alt="">
                         </div>
                         <h3>Web designer needed</h3>
                         <span>Quick Studio</span>
                     </div>
                     <div class="col-md-2">
                         <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
                     </div>
                     <div class="col-md-2">
                         <p>Nov 14th, 2017</p>
                     </div>
                     <div class="col-md-3">
                         <p>Resume.docx</p>
                     </div>
                 </div>
             </div>
             <div class="applications-content">
                 <div class="row">
                     <div class="col-md-5">
                         <div class="thums">
                             <img src="{{asset('img/jobs/img-1.jpg')}}" alt="">
                         </div>
                         <h3>Looking for a Project Leader</h3>
                         <span>Quick Studio</span>
                     </div>
                     <div class="col-md-2">
                         <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
                     </div>
                     <div class="col-md-2">
                         <p>Nov 14th, 2017</p>
                     </div>
                     <div class="col-md-3">
                         <p>Resume.docx</p>
                     </div>
                 </div>
             </div>
             <div class="applications-content">
                 <div class="row">
                     <div class="col-md-5">
                         <div class="thums">
                             <img src="{{asset('img/jobs/img-1.jpg')}}" alt="">
                         </div>
                         <h3>We're hiring an fullstack designer</h3>
                         <span>Quick Studio</span>
                     </div>
                     <div class="col-md-2">
                         <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
                     </div>
                     <div class="col-md-2">
                         <p>Nov 14th, 2017</p>
                     </div>
                     <div class="col-md-3">
                         <p>Resume.docx</p>
                     </div>
                 </div>
             </div>--}}
    </div>
@endsection