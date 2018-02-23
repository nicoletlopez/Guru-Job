@extends('faculty.dashboard-menu')
@section('title')- Manage Lectures @endsection
@section('current') Manage Lectures @endsection
@section('current-header') Manage Lectures @endsection
@section('manage-lectures-active') active @endsection

@section('dashboard-content')

    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Manage
            Lectures  <a href="{{route('lectures.create')}}" class="btn btn-success">Add a Lecture</a></h3>
        @if(count($lectures)>0)
            <table class="table">
                <thead class="">
                <tr>
                    <th>Lecture Title</th>
                    <th># of Files</th>
                    <!--<th>Assigned to</th>-->
                    <!--<th>Action</th>-->
                </tr>
                </thead>
                <tbody>
                @foreach($lectures as $lecture)
                    <tr>
                        <td><a href="/lectures/{{$lecture->id}}"><h3>{{$lecture->title}}</h3></a></td>
                        <td><p class="badge">{{$lecture->files->count()}}</p></td>
                        <!--<td><p>APC</p></td>-->
                        <!--<td><p></p></td>-->
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h4>No Lectures.</h4>
        @endif
    </div>
@endsection