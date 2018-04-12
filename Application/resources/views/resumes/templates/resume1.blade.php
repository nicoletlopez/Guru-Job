<link rel="stylesheet" href="{{asset('self/css/resume/resume1.css')}}" type="text/css"/>
<div id="cv" class="">
    <div class="mainDetails">
        <div id="headshot" class="">
            <img src="
            @if($faculty->user->profile->picture)
            {{$faculty->user->profile->picture}}
            @else
            {{asset('img/default-user.png')}}
            @endif" alt=""/>
        </div>

        <div id="name">
            <h1 class="">{{$faculty->user->name}}</h1>
            <!--<h2 class="">Job Title</h2>-->
        </div>

        <div id="contactDetails" class="">
            <ul>
                <li>e: <a href="mailto:{{$faculty->user->email}}" target="_blank">{{$faculty->user->email}}</a></li>
                <!--<li>w: <a href="http://www.bloggs.com">www.bloggs.com</a></li>-->
                <li>m: {{$faculty->user->profile->contact_number}}</li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div id="mainArea" class="">
        <section>
            <article>
                <div class="sectionTitle">
                    <h1>Personal Profile</h1>
                </div>

                <div class="sectionContent">
                    {!! $faculty->user->profile->description !!}
                </div>
            </article>
            <div class="clear"></div>
        </section>


        <section>
            <div class="sectionTitle">
                <h1>Work Experience</h1>
            </div>

            <div class="sectionContent">
                <article>
                    {!! $experience !!}
                </article>
                <!--
                <article>
                    <h2>Job Title at Company</h2>
                    <p class="subDetails">April 2011 - Present</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.</p>
                </article>

                <article>
                    <h2>Job Title at Company</h2>
                    <p class="subDetails">Janruary 2007 - March 2011</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.</p>
                </article>

                <article>
                    <h2>Job Title at Company</h2>
                    <p class="subDetails">October 2004 - December 2006</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.</p>
                </article>
                -->
            </div>
            <div class="clear"></div>
        </section>
        <section>
            <div class="sectionTitle">
                <h1>Skills</h1>
            </div>

            <div class="sectionContent">
                <article>
                    {!! $skill !!}
                </article>
                <!--
                <ul class="keySkills">
                    <li>A Key Skill</li>
                    <li>A Key Skill</li>
                    <li>A Key Skill</li>
                    <li>A Key Skill</li>
                    <li>A Key Skill</li>
                    <li>A Key Skill</li>
                    <li>A Key Skill</li>
                    <li>A Key Skill</li>
                </ul>
                -->
            </div>
            <div class="clear"></div>
        </section>


        <section>
            <div class="sectionTitle">
                <h1>Education</h1>
            </div>

            <div class="sectionContent">
                <article>
                    {!!$education !!}
                </article>
                <!--
                <article>
                    <h2>College/University</h2>
                    <p class="subDetails">Qualification</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim.</p>
                </article>

                <article>
                    <h2>College/University</h2>
                    <p class="subDetails">Qualification</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim.</p>
                </article>
                -->
            </div>
            <div class="clear"></div>
        </section>
    </div>
</div>

<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    var pageTracker = _gat._getTracker("UA-3753241-1");
    pageTracker._initData();
    pageTracker._trackPageview();
</script>
