<x-mail::message>
# Your message has been sent to the Super-Admin

Welcome  {{$name}} in {{ config('app.name') }}

<x-mail::panel>
Your order number to proceed is:  {{$id}}
</x-mail::panel>

<x-mail::button :url="'http://localhost:8000/request/complaints/search'" color="success">
order tracking
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
