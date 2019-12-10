@component('mail::message')
# Hello fucker {{ $user->name }}

You changed your email your new activation button is below

@component('mail::button', ['url' => route('verify', $user->verification_token) ])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
