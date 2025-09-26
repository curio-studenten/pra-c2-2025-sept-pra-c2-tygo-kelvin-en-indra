@php
    $alphabet = range('A', 'Z');
@endphp

<nav class="alphabet-filter" style="margin-bottom:1rem;">
    <span>Ga naar letter:</span>
    @foreach($alphabet as $letter)
        <a href="#letter-{{ $letter }}" class="alphabet-link" style="margin:0 3px;">{{ $letter }}</a>
    @endforeach
</nav>
