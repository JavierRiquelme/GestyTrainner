@component('mail::message')
# Confirma tu correo electrónico

<p>Gracias por elegir GestiTrainner para encontrar tus entrenamientos a medida.
Gestytrainner te ofrece todo lo que necesitas, para encontrar tu entenamiento de 
Yoga, Pilates, Body Pump, Ciclo Indoor, Zumba, Entrenamiento funcional y mucho más.<p> 

<p>Para confirmar tu cuenta y poder buscar tus entrenamientos, 
pulsa el botón de confirmación</p>

@component('mail::button', ['url' => 'http://gestytrainner.test/blog'])
Confirmar mi cuenta
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
