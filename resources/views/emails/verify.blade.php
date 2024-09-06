@component('mail::message')

{{-- Logo centrado --}}
<div style="text-align: center; margin-bottom: 20px;">
    <img src="https://i.ibb.co/3p1KkJq/logo.png" alt="Logo de Tu Empresa" style="width: 150px; height: auto;">
    
</div>
{{-- Encabezado --}}
# ¡Hola!

Gracias por registrarte en **{{ config('app.name') }}**. Por favor, verifica tu dirección de correo electrónico haciendo clic en el botón de abajo:

{{-- Botón de Verificación con color personalizado --}}
@component('mail::button', ['url' => $verificationUrl, 'color' => 'custom'])
Verificar Correo Electrónico
@endcomponent

Si no solicitaste esta verificación, simplemente ignora este correo.

{{-- Pie de Página --}}
<div style="text-align: center; margin-bottom: 20px;">
Gracias,<br>
{{ config('app.name') }}
</div>
@endcomponent
