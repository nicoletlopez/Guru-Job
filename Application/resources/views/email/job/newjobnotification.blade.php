@component('mail::message')
## New opportunities abound

Good day, {{$user}}! You may be interested in this new job, posted by {{$school}}, called '[{{$jobTitle}}]({{$url}})'.

@component('mail::button', ['url' => $url])
Job Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
