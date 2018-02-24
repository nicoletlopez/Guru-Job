@component('mail::message')
# Welcome to Guru App

Thanks for signing up! **We hope** to help you get your dream job!

@component('mail::button', ['url' => 'http://guru.apc/'])
Go To Guru App
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
