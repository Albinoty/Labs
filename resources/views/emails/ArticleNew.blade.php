@component('mail::message')
# Nouveau Article

Un nouvel article a été créer. Soyez le premier à le consulter et a commenté.

@component('mail::button', ['url' => route('post.show',[$article->id,$article->slug])])
Lire l'article
@endcomponent

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
