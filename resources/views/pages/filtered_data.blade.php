<x-layouts.app>
    <x-filtered-data />
    @php
        $brands = \App\Models\Brand::orderBy('name')->get();
        $alphabet = range('A', 'Z');
        $lettersWithBrands = [];

        foreach ($alphabet as $letter) {
            $hasBrand = false;

            foreach ($brands as $brand) {
                if (strtoupper(substr($brand->name, 0, 1)) == $letter) {
                    $hasBrand = true;
                    break;
                }
            }

            if ($hasBrand) {
                $lettersWithBrands[] = $letter;
            }
        }


        $lettersWithBrands = array_chunk($lettersWithBrands, 3);
    @endphp
    <div class="brands-list">
        @foreach($lettersWithBrands as $letters)
    <div class="brands-row">
        @foreach($letters as $letter)
            @php
                $brandsForLetter = [];
                foreach ($brands as $brand) {
                    if (strtoupper(substr($brand->name, 0, 1)) == $letter) {
                        $brandsForLetter[] = $brand;
                    }
                }
            @endphp

            <div class="brand-column">
                <h2 id="letter-{{ $letter }}">{{ $letter }}</h2>
                <ul>
                    @foreach($brandsForLetter as $brand)
                        <li>
                            <a href="/{{ $brand->id }}/{{ $brand }}/">
                                <button>{{ $brand->name }}</button>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endforeach
    </div>
</x-layouts.app>
