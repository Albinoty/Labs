@component('mail::message')
# Nouvea Article

Un nouvel article était créé. Soyez le premier le consulter à le consulter et a commenté.

@component('mail::button', ['url' => url('/blog')])
Lire l'article
@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
