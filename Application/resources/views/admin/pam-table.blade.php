@extends('base')
@section('content')

    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">
            Subscriptions
        </h3>
        <table class="table" style="width: 50%">

            <thead>
            <tr>
                <th>School</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Subscribed On</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $school)
                <tr>
                    <td style="vertical-align: middle">
                        {{$school->user->name}}
                    </td>
                    <td style="vertical-align: middle">
                        {{$school->balance}}
                    </td>
                    <td style="vertical-align: middle">
                        Active
                    </td>
                    <td style="vertical-align: middle">
                        {{$school->user->created_at}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection