@component('mail::message')
<h1>Tanque Nuevo Registrado</h1>

El tanque '{{ $tank->name }}' ha sido registrado en la galería.

@component('mail::button', ['url' => route('tank.show', $tank)])
Ver tanque
@endcomponent

Saludos, <br>
{{ config('app.name') }}
@endcomponent