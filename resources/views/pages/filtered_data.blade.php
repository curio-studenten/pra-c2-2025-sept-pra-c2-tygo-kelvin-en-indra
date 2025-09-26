<x-layouts.app >
<x-filtered-data />
<div class="brands-list">
    @php
        $brands = \App\Models\Brand::orderBy('name')->get();
        $alphabet = range('A', 'Z');
    @endphp

    @foreach($alphabet as $letter)
        @php
            $brandsForLetter = $brands->filter(function($brand) use ($letter) {
                return strtoupper(substr($brand->name, 0, 1)) === $letter;
            });
        @endphp

        @if($brandsForLetter->isNotEmpty())
            <h2 id="letter-{{ $letter }}">{{ $letter }}</h2>
            <ul>
                @foreach($brandsForLetter as $brand)
                    <li>
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                        <button>{{ $brand->name }}</button>
                    </a>
                </li>
                @endforeach
            </ul>
        @endif
    @endforeach
</div>
</x-layouts.app>
