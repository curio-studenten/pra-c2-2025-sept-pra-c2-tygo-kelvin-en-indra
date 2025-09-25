<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }} - {{ $manual->name }}</h1>


    @if ($manual->locally_available)
        <iframe src="{{ $manual->url }}" width="780" height="600"></iframe>
    @else
        <a href="{{ $manual->url }}" target="new">Klik hier om de handleiding te bekijken</a>
    @endif

</x-layouts.app>
