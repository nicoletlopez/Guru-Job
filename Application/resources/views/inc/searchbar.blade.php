<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                {{--<form action="{{route("search")}}" method="get">--}}
                {!! Form::open(['route'=>'search','method'=>'GET']) !!}
                <div class="row">
                    {{--Search Term--}}
                    <div class="col-md-5">
                        <div class="form-group">
                            {{--<input class="form-control" type="text" name="s" placeholder="job title / keywords">--}}
                            {{Form::text('search-term','',['class'=>'form-control','placeholder'=>'job title/keywords'])}}
                        </div>
                    </div>
                    {{--Region--}}
                    <div class="col-md-3">
                        <div class="search-category-container">
                            <label class="styled-select">
                            {{Form::select('region',
                            [null=>'All Regions',
                            'NCR'=>'National Capital Region',
                            'R1'=>'Ilocos Region',
                            'CAR'=>'Cordillera Administrative Region',
                            'R2'=>'Cagayan Valley',
                            'R3'=>'Central Luzon',
                            'R4A'=>'CALABARZON',
                            'R4B'=>'MIMAROPA',
                            'R5'=>'Bicol Region',
                            'R6'=>'Western Visayas',
                            'R7'=>'Central Visayas',
                            'R8'=>'Eastern Visayas',
                            'R9'=>'Zamboanga Peninsula',
                            'R10'=>'Northern Mindanao',
                            'R11'=>'Davao Region',
                            'R12'=>'SOCCKSARGEN',
                            'R13'=>'Caraga Region',
                            'ARMM'=>'Autonomous Region in Muslim Mindanao',],
                            null,
                            ['class'=>'dropdown-product selectpicker'])}}
                            </label>
                        </div>
                    </div>
                    {{--Specialization--}}
                    <div class="col-md-3">
                        <div class="search-category-container">
                            <label class="styled-select">
                            {{Form::select('specialization',
                            [null=>'All Specializations',
                            'JAVA'=>'Java',
                            'DATA'=>'Data Networks',
                            'EMB'=>'Embedded Networks',],
                            null,
                            ['class'=>'dropdown-product selectpicker'])}}
                            </label>
                        </div>
                    </div>
                    {{--Submit Button--}}
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-search-icon"><i class="ti-search"></i></button>
                    </div>
                </div>
                <br/>
                <div class="row">
                    {{--Free Day--}}
                    <div class="col-md-5">
                        <label>Work Day</label>
                        <div class="search-category-container">
                            <label class="styled-select">
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
                            ['class'=>'dropdown-product selectpicker'])}}
                            </label>
                        </div>
                    </div>
                    {{--Start Time--}}
                    <div class="col-md-3">
                        <label>Work Time From</label>
                        <div class="form-group">
                            {{Form::time('start-time','',['class'=>'form-control','step'=>'900'])}}
                        </div>
                    </div>
                    {{--End Time--}}
                    <div class="col-md-3">
                        <label>Work Time To</label>
                        <div class="form-group">
                            {{Form::time('end-time','',['class'=>'form-control','step'=>'900'])}}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>