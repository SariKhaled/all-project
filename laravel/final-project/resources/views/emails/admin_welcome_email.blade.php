<x-mail::message>
# verification Admin email

Welcome  {{$name}} in {{ config('app.name') }}

Your acount id is :{{$id}}

<x-mail::panel>
Your email is :  {{$email}}

Your password is :  {{$password}}
</x-mail::panel>


<x-mail::button :url="''" color="success">
Admin Panel
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
