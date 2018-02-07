@extends('hr.dashboard-menu')
@section('title')- School Profile @endsection
@section('current') School Profile @endsection
@section('current-header') School Profile @endsection
@section('hr-profile-active') active @endsection

@section('dashboard-content')

    <div class="inner-box my-resume">
        <div class="author-resume">
            <div class="row">
            <div class="thumb col-md-7">
                <img class="im" src="{{asset('self/img/school.jpg')}}" alt="">
            </div>
            <div class="col-md-5">
                <h3>schoolName</h3>
                <p class="sub-title">Established in: January 5, 1998</p>
                <p><span class="address"><i class="ti-location-pin"></i> Mahattan, NYC, USA</span> <span><i class="ti-mobile"></i> (+01) 211-123-5678</span></p>
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
            </div>
            </div>
        </div>
        <div class="about-me item">
            <h3>About the School <i class="ti-pencil"></i></h3>
            <p>Nullam semper erat arcu, ac tincidunt sem venenatis vel. Curabitur a dolor ac ligula
                fermentum eusmod ac ullamcorper nulla. Integer blandit uitricies aliquam. Pellentesque
                quis dui varius, dapibus vilit id, ipsum. Morbi ac eros feugiat, lacinia elit ut,
                elementum turpis. Curabitur justo sapien, tempus sit amet ruturm eu, commodo eu lacus.
                Morbi in ligula nibh. Maecenas ut mi at odio hendririt eleif end tempor vitae augue.
                Fusce eget arcu et nibh dapibus maximus consectetur in est. Sed iaculis Luctus nibh sed
                veneatis. </p>
        </div>
        <!--
        <div class="work-experence item">
            <h3>Vision <i class="ti-pencil"></i></h3>
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
            <h3>Mission <i class="ti-pencil"></i></h3>
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
@endsection