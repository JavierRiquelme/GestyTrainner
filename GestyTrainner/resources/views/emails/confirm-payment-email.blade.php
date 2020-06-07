@component('mail::message')
# Pago realizado

El pago de la clase se ha realizado correctamente.

@component('mail::button', ['url' => 'http://gestytrainner.test/frontblog/blog/list-mis-clases'])
Comfirmar pago
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
