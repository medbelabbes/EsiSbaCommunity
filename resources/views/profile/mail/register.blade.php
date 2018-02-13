@component('mail::message')
# Invitation

Vous avez reçu une invitation pour rejoindre EsiSbaCommunity.

@component('mail::button', ['url' => 'http://localhost:8000/register'])
Inscrivez-vous
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
