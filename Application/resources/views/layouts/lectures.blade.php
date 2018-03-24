@extends('faculty.dashboard-menu')
@section('manage-lectures-active') active @endsection

@section('dashboard-content')
    <a href="{{route('lectures.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="row">
            <div class="col-md-12">
                <div class="content-area">
                    @include('inc.lecture-tabs')
                    <div class="box col-md-12">
                        @yield('active-tab-content')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection