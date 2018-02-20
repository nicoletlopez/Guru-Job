@component('mail::message')
# Job Application

Good day {{$schoolName}}!
{{$applicantName}} has applied for your job post, {{$jobTitle}}.

@component('mail::button', ['url' => ''])
Applicant Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent



link to user's profile