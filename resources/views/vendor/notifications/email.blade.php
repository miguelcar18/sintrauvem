@component('mail::layout')
{{-- Greeting --}}

{{-- Header --}}
@slot('header')
    <center>
        <img src="https://scontent-atl3-1.xx.fbcdn.net/v/t1.0-9/10307223_1382879621996419_3259061026144468685_n.jpg?oh=c7c9bd5140d60a3dfcfafede3af1394b&oe=5A58D8CB" alt="" >
    </center>
@endslot
{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Regards,<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@component('mail::subcopy')
Si tiene problemas al hacer clic en el botón "{{ $actionText }}", copie y pegue la URL a continuación en su navegador web: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
    <footer style="text-align: center">
        &copy; 2017 <a href="{{ URL::route('principal') }}">Sintrauvem</a> "Por la alianza y bienestar de nuestros trabajadores"</a>
    </footer>
@endslot

@endcomponent
