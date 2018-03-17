<div class="well">
    {!! Form::open(['route'=>'search','method'=>'GET']) !!}
    <h3>Search Criteria</h3>
    <br/>
    {{--Search Term--}}
    <div class="form-group">
        {{Form::label('search-term-label', 'Search Term')}}
        {{Form::text('search-term','',['class'=>'form-control','placeholder'=>'job title/keywords'])}}
    </div>
    <div class="form-group">
        <div class="search-category-container">
            {{Form::label('region-label', 'Select Region')}}
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
            ['class'=>'dropdown-product selectpicker', 'style'=>'height:40px !important;'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="search-category-container">
            {{Form::label('specialization-label', 'Select Specialization')}}
            {{Form::select('specialization',
            [null=>'All Specializations',
            'JAVA'=>'Java',
            'DATA'=>'Data Networks',
            'EMB'=>'Embedded Networks',],
            null,
            ['class'=>'dropdown-product selectpicker'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="search-category-container">
            {{Form::label('type-label', 'Select Job Type')}}
            {{Form::select('type',
            [null=>'All Types',
            'FT'=>'Full-Time',
            'PT'=>'Part-Time',],
            null,
            ['class'=>'dropdown-product selectpicker'])}}
        </div>
    </div>
    <div class="form-group">
        <div class="search-category-container">
            {{Form::label('work-day-label', 'Select Work Day')}}
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
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                {{Form::label('work-time-from-label', 'Work Time From')}}
                {{Form::time('start-time','',['class'=>'form-control','step'=>'900'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('work-time-to-label', 'Work Time To')}}
                {{Form::time('end-time','',['class'=>'form-control','step'=>'900'])}}
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-common btn-block">Search</button>
    {!! Form::close() !!}
</div>