@component('mail::message')
# Application Accepted

Good day {{$applicantName}}!
{{$schoolName}} has accepted your application for the job, {{$jobTitle}}.

Please wait for them to contact you for a possible interview.

Thank you for using Guru Job Services!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
