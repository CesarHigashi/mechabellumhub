@component('mail::message')
<h1>Avión Nuevo Registrado</h1>

El avión '{{ $plane->name }}' ha sido registrado en la galería.

@component('mail::button', ['url' => route('plane.show', $plane)])
Ver avión
@endcomponent

Saludos, <br>
{{ config('app.name') }}
@endcomponent