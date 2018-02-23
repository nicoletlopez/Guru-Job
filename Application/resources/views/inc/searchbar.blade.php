{{--
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                <form action="{{route("search")}}" method="get">
                    <div class="row">
                        <div class="col-md-11 col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="s" placeholder="job title / keywords">
                            </div>
                        </div>
                        <!--
                        <div class="col-md-4 col-sm-6">
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select class="dropdown-product selectpicker">
                                        <option>All Locations</option>
                                        <option>Makati</option>
                                        <option>Manila</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select class="dropdown-product selectpicker">
                                        <option>All Categories</option>
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
                        -->
                        <div class="col-md-1 col-sm-6">
                            <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
--}}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                {{--<form action="{{route("search")}}" method="get">--}}
                {!! Form::open(['route'=>'search','method'=>'GET']) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{--<input class="form-control" type="text" name="s" placeholder="job title / keywords">--}}
                            {{Form::text('search-term','',['class'=>'form-control','placeholder'=>'job title/keywords'])}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {{Form::select('region',
                            [null=>'All Regions',
                            'NCR'=>'NCR',
                            'I'=>'Region I',
                            'II'=>'Region II',
                            'III'=>'Region III',
                            'IV'=>'Region IV',
                            'V'=>'Region V',
                            'VI'=>'Region VI'],
                            null,
                            ['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {{Form::select('specialization',
                            [null=>'All Specializations',
                            'JAVA'=>'Java',
                            'DATA'=>'Data Networks',
                            'EMB'=>'Embedded Networks',],
                            null,
                            ['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {{Form::select('free-day',
                            [null=>'All Days',
                            'SUN'=>'Sunday',
                            'MON'=>'Monday',
                            'TUE'=>'Tuesday',
                            'WED'=>'Wednesday',
                            'THU'=>'Thursday',
                            'FRI'=>'Friday',
                            'SAT'=>'Saturday'],
                            null,
                            ['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>