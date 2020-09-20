@component('mail::message')
# Hello

Thank you for registering to our web application.
Please click the button below to verify your account.

@component('mail::button', ['url' => ''])
Verify it now!
@endcomponent

If you did not create an account, no further action is required.


Regards,<br>
{{ config('app.name') }}
@endcomponent
