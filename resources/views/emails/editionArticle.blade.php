@component('mail::message')
# Il y'a eu un soucis lors de la publication de l'article.

Un des admin a trouvé un soucis dans votre article. Corriger la en vous connectant.

@component('mail::button', ['url' => url('/articles')])
Connectez vous
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
