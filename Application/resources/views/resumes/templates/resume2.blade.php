<link rel="stylesheet" href="{{asset('self/css/resume/resume2.css')}}" type="text/css"/>

<div id="page-wrap">

    <img width="200" src="{{auth()->user()->profile->picture}}" id="pic"/>

    <div id="contact-info" class="vcard">

        <!-- Microformats! -->

        <h1 class="fn" style="word-wrap:break-word;line-height:1;">{{auth()->user()->name}}</h1>

        <p>
            Cell: <span class="tel">{{auth()->user()->profile->contact_number}}</span><br/>
            Email: <a href="mailto:{{auth()->user()->email}}" target="_blank">{{auth()->user()->email}}</a>
        </p>
    </div>

    <div id="objective">
            {!! auth()->user()->profile->description !!}
    </div>

    <div class="clear"></div>

    <dl>
        <dd class="clear"></dd>

        <dt>Education</dt>

        <dd>
        {!! $education !!}
        <!--
            <h2>Withering Madness University - Planet Vhoorl</h2>
            <p><strong>Major:</strong> Public Relations<br />
                <strong>Minor:</strong> Scale Tending</p>
                -->
        </dd>

        <dd class="clear"></dd>

        <dt>Skills</dt>
        <dd>
        {!! $skill !!}
        <!--
            <h2>Office skills</h2>
            <p>Office and records management, database administration, event organization, customer support, travel coordination</p>

            <h2>Computer skills</h2>
            <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
            -->
        </dd>

        <dd class="clear"></dd>

        <dt>Experience</dt>
        <dd>
        {!! $experience !!}
        <!--
            <h2>Doomsday Cult <span>Leader/Overlord - Baton Rogue, LA - 1926-2010</span></h2>
            <ul>
                <li>Inspired and won highest peasant death competition among servants</li>
                <li>Helped coordinate managers to grow cult following</li>
                <li>Provided untimely deaths to all who opposed</li>
            </ul>

            <h2>The Watering Hole <span>Bartender/Server - Milwaukee, WI - 2009</span></h2>
            <ul>
                <li>Worked on grass-roots promotional campaigns</li>
                <li>Reduced theft and property damage percentages</li>
                <li>Janitorial work, Laundry</li>
            </ul>
            -->
        </dd>

    </dl>

    <div class="clear"></div>

</div>