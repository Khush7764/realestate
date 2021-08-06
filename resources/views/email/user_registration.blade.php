@component('mail::message')
# @lang('Hello!')

Please click the button below to verify your email address.

@component('mail::button', ['url' => $url])
Verify Email Address
@endcomponent

If you don't create an account, no further action required.

Regards,<br>
{{ config('app.name') }}
@endcomponent
