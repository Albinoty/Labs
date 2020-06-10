@component('mail::message')
Un des visiteur a déposé un message.

**Nom:** {{request()->input('name')}} <br>
**Email:** {{request()->input('email')}} <br>
**Sujet:** {{request()->input('sujet')}} <br>
**Message:** {{request()->input('message')}}

@endcomponent
