@extends('hr.dashboard-menu')
@section('manage-applications-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="row">
            <div class="col-md-12">
                <div class="content-area">
                    @include('inc.application-tabs')
                    <div class="box col-md-12">
                        @yield('active-tab-content')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection