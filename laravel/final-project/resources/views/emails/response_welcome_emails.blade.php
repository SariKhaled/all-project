<x-mail::message>
# Your message has been sent to the {{$admin_name}}-Admin

Welcome  {{$name}} in {{ config('app.name') }}

<x-mail::panel>
Admin reply to your message is:
{{$response}}
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
