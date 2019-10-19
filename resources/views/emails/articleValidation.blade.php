@component('mail::message')
# Attente Validation

Un article a été créé et attends votre connexion.

@component('mail::button', ['url' => url('/articles/validation')])
Connectez-Vous
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
