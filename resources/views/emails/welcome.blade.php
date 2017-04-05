@component('mail::message')
# Thanks for signing up on Taskr!

We are glad that you have joined the family. You can now continue.

@component('mail::button', ['url' => ''])
Confirm Email
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
