@component('mail::message')
# Hi {{ ucfirst($user->name) }} Thank you for joining us, Gate to Korea!

@component('mail::panel')
You are registered to Gate to Korea website with {{ $user->email }}.
Your temporary password is {{ $fp }}, please change your password immediately!
@endcomponent

@component('mail::button', ['url' => route('manage.index')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
