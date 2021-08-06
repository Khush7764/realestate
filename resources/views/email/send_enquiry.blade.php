@component('mail::message')
# Hello Admin, New enquiry raised

<b>Mention customer details below.</b>

Name : {{$enquiry->name}} <br>
Email : {{$enquiry->email}} <br>
Contact : {{$enquiry->contact}} <br>
Message : {{$enquiry->message}} <br>

<b>For property</b>

Title: {{$property->title}} <br>
Price: $ {{number_format($property->price)}} <br>
City: {{$property->city}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
