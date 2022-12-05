@component('mail::message')
<h1>Avión Nuevo Registrado</h1>

El avión '{{ $avion->name }}' ha sido registrado en la galería.

@component('mail::button', ['url' => route('avion.show', $avion)])
Ver avión
@endcomponent

Saludos, <br>
{{ config('app.name') }}
@endcomponent