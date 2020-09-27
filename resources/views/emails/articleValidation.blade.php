@component('mail::message')
# Attente Validation d'un article

Un article a été créé et attend votre connexion.

Pour plus d'informations veuillez vous connecter dans votre dashboard
@component('mail::button', ['url' => url('/articles/validation')])
Connectez-Vous
@endcomponent

Cordialement,<br>
{{config('app.name') }}
@endcomponent
