<x-mail::message>
# New Message from AgroAI Contact Form

**Name:** {{ $details['first_name'] }} {{ $details['last_name'] }}  
**Email:** {{ $details['email'] }}

**Message:**  
{{ $details['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
