@extends('hr.dashboard-menu')
@section('title')- Edit Profile @endsection
@section('current') Edit Profile @endsection
@section('current-header') Edit Profile @endsection
@section('hr-profile-active') active @endsection
@section('profile-active') active @endsection

@section('dashboard-content')
    <link rel="stylesheet" href="{{asset('self/css/profile/picture.css')}}" type="text/css">
    @include('inc.messages')
    {!! Form::open(['action'=>['ProfileController@update',$profile->user_id],'class'=>'form-ad','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    {{Form::submit('Save changes',['class'=>'btn btn-success'])}}
    <a href="{{route('profile')}}" class="btn btn-warning">Cancel</a>

    <br/><br/>
    <div class="inner-box my-resume">
        <div class="row">
            <div class="thumb col-md-3">
                <div id="dropzone">
                    <div>Drop/Click</div>
                    {{Form::file('picture',['accept'=>'image/png,image/jpeg,image/bmp'])}}
                </div>
            </div>
            <div class="col-md-9">
                <h3>{{Form::text('name',$user->name,['class'=>'form-control','required'])}}</h3>
                <div class="">
                    <p class="sub-title">
                        @if(Auth::user()->type == 'HR')
                            Established on:
                            {{Form::date('dob',$profile->dob,['class'=>'form-control','min'=>'1000-12-31','max'=>date("Y").'-12-31','required'])}}

                        @else
                            {{Form::hidden('dob',$profile->dob)}}
                        @endif
                    </p>
                </div>
                <div class="form-inline">
                    <p><span class="address"><i
                                    class="ti-home"></i>&#9;
                            {{Form::text('address',$profile->street_address,['class'=>'form-control','style'=>'margin-left:29px','required'])}}</span>
                    </p>
                </div>
                <div class="form-inline">
                    <p><span class="address"><i
                                    class="ti-location-pin"></i>{{Form::text('city',$profile->city,['class'=>'form-control','style'=>'margin-left:32px','required'])}}</span>
                    </p>
                </div>
                <div class="form-inline">
                    <p>
                        <span class="address"><i class="ti-mobile"></i>
                            {{Form::label('','+63',['class'=>'control-label'])}}
                            {{Form::text('contact',$profile->contact_number,['class'=>'form-control','data-inputmask'=>"'mask':'9999999999'",'required'])}}
                     </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="about-me item">
            <h3>About</h3>
            {{Form::textarea('description',$profile->description,['id'=>'editor0','class'=>'form-control','placeholder'=>''])}}
        </div>
    </div>
    {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}
    <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery.inputmask/extra/bindings/inputmask.binding.js')}}"></script>
    <script>
        $(function() {

            $('#dropzone').on('dragover', function() {
                $(this).addClass('hover');
            });

            $('#dropzone').on('dragleave', function() {
                $(this).removeClass('hover');
            });

            $('#dropzone input').on('change', function(e) {
                var file = this.files[0];

                $('#dropzone').removeClass('hover');

                if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) === -1) {
                    return alert('File type not allowed.');
                }

                $('#dropzone').addClass('dropped');
                $('#dropzone img').remove();

                if ((/^image\/(gif|png|jpeg|bmp)$/i).test(file.type)) {
                    var reader = new FileReader(file);

                    reader.readAsDataURL(file);

                    reader.onload = function(e) {
                        var data = e.target.result,
                            $img = $('<img />').attr('src', data).fadeIn();

                        $('#dropzone div').html($img);
                    };
                } else {
                    var ext = file.name.split('.').pop();

                    $('#dropzone div').html(ext);
                }
            });
        });
    </script>
@endsection