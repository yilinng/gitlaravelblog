@component('mail::message')

#thank you for your message

<strong>name</strong> {{ $data['name'] }}
<strong>email</strong> {{ $data['email'] }}

<strong>message</strong>

{{ $data['message'] }}
@endcomponent
