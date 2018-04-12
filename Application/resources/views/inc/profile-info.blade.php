<div class="inner-box my-resume">
    @if(Auth::user()->type == 'HR')
        <div class="row">

                <div class="thumb col-md-3">
                    <img class="img-rounded center-block" height="128" width="128" src="{{$profile->picture}}" alt="">
                </div>
                <div class="col-md-9">
                    <h3>{{$user->name}}<a href="#" data-target=".edit-personal-details" data-toggle="modal"><i
                                    class="ti-pencil"></i></a></h3>
                    <p class="sub-title">Established on: {{$date}}</p>
                    <p><span class="address"><i class="ti-home"></i> {{$profile->street_address}}</span></p>
                    <p><span class="address"><i class="ti-location-pin"></i> {{$profile->city}}</span></p>
                    <p><span class="address"><i class="ti-mobile"></i> {{$profile->contact_number}}</span></p>
                    <!--
                    <div class="social-link">
                        <a class="twitter" target="_blank" data-original-title="twitter" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                        <a class="facebook" target="_blank" data-original-title="facebook" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                        <a class="google" target="_blank" data-original-title="google-plus" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                        <a class="linkedin" target="_blank" data-original-title="linkedin" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                    </div>
                    -->
                </div>

        </div>
        <div class="about-me item">
            <h3>About the School <a href="#" data-target=".edit-description" data-toggle="modal"><i
                            class="ti-pencil"></i></a></h3>
            <p>{!! $profile->description !!}</p>
        </div>
    @else
        @if(Auth::user()->id == $profile->user_id)
            <div class="row">
                <div class="thumb col-md-3">
                    <img class="img-rounded center-block" height="128" width="128" src="{{$profile->picture}}" alt="">
                </div>
                <div class="col-md-9">
                    <h3>{{$user->name}} <a href="#" data-target=".edit-personal-details" data-toggle="modal"><i
                                    class="ti-pencil"></i></a></h3>
                    <!--<p class="sub-title">UI/UX Designer</p>-->
                    <p><span class="address"><i class="ti-home"></i> {{$profile->street_address}}</span></p>
                    <p><span class="address"><i class="ti-location-pin"></i> {{$profile->city}}</span></p>
                    <p><span class="address"><i class="ti-mobile"></i> {{$profile->contact_number}}</span></p>
                    <!--
                    <div class="social-link">
                        <a class="twitter" target="_blank" data-original-title="twitter" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                        <a class="facebook" target="_blank" data-original-title="facebook" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                        <a class="google" target="_blank" data-original-title="google-plus" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                        <a class="linkedin" target="_blank" data-original-title="linkedin" href="#"
                           data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                    </div>
                    -->
                </div>
            </div>
            <div class="about-me item">
                <h3>About <a href="#" data-target=".edit-description" data-toggle="modal"><i class="ti-pencil"></i></a>
                </h3>
                {!! $profile->description !!}
            </div>
        @endif
    @endif

<!--
    <div class="work-experence item">
        <h3>Work Experience <i class="ti-pencil"></i></h3>
        <h4>UI/UX Designer</h4>
        <h5>Bannana INC.</h5>
        <span class="date">Fab 2017-Present(5year)</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero vero, dolores, officia
            quibusdam architecto sapiente eos voluptas odit ab veniam porro quae possimus itaque,
            quas! Tempora sequi nobis, atque incidunt!</p>
        <p><a href="#">4 Projects</a></p>
        <br>
        <h4>UI Designer</h4>
        <h5>Whale Creative</h5>
        <span class="date">Fab 2017-Present(2year)</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero vero, dolores, officia
            quibusdam architecto sapiente eos voluptas odit ab veniam porro quae possimus itaque,
            quas! Tempora sequi nobis, atque incidunt!</p>
        <p><a href="#">4 Projects</a></p>
    </div>
    <div class="education item">
        <h3>Education <i class="ti-pencil"></i></h3>
        <h4>Massachusetts Institute Of Technology</h4>
        <p>Bachelor of Computer Science</p>
        <span class="date">2010-2014</span>
        <br>
        <h4>Massachusetts Institute Of Technology</h4>
        <p>Bachelor of Computer Science</p>
        <span class="date">2010-2014</span>
    </div>
    -->
</div>


<!--MODALS-->
@include('profile.profile-edit-personal')
@include('profile.profile-edit-description')
