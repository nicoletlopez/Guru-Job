@extends('hr.dashboard-menu')
@section('title')- Manage Applications @endsection
@section('current') Manage Applications @endsection
@section('current-header') Manage Applications @endsection
@section('manage-applications-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Manage applications</h3>
        <table class="table">
            <thead class="">
            <tr>
                <th>Job Title</th>
                <th>Applicant</th>
                <th>Name</th>
                <th>Date Applied</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#"><h3>jobTitle</h3></a></td>
                    <td><div class="can-img"><a href="#"><img class="img-circle" src="https://lorempixel.com/640/480/?57746" alt=""></a>
                        </div></td>
                    <td>applicantName</td>
                    <td>dateApplied</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection