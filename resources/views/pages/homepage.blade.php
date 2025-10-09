<x-layouts.app>
    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <x-slot:title>
        {{ __('misc.all_brands') }}
    </x-slot:title>

    <div class="container">
        <div class="leaderboard-brands">
            <h2>Top 10 Meest Bekeken 🏆 Handleidingen 🏆</h2>
            <ol>
                @foreach($top10Manuals as $manual)
                    <li>
                        <a href="/{{ $manual->brand_id }}/{{ $manual->brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">
                            {{ $manual->name }}
                        </a> – {{ $manual->visits }} keer bekeken
                    </li>
                @endforeach
            </ol>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($brandsByCategory as $category => $brands)
            <div class="col-md-6 mb-4">
                <div class="category-block">
                    <h2>{{ $category }}</h2>
                    <ul>
                        @foreach($brands as $brand)
                            <li>
                                <a href="/brand/{{ $brand->name }}/">
                                    <button>{{ $brand->name }}</button>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>
