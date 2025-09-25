<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/">{{ __('misc.all_brands') }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <ul>
        @foreach ($manuals as $manual)
            <li>
                @if ($manual->locally_available)
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">
                        {{ $manual->name }}
                    </a>
                @else
                    <a href="{{ $manual->url }}" target="new">{{ $manual->name }}</a>
                @endif

                – bekeken: {{ $manual->visits }} keer
                ({{ $manual->filesize_human_readable }})
            </li>
        @endforeach
    </ul>

</x-layouts.app>
