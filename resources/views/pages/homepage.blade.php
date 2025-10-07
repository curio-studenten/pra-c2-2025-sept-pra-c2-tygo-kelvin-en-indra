<x-layouts.app>

    <x-slot:introduction_text>
        <p>
            <img src="img/afbl_logo.png" align="right" width="100" height="100">
            {{ __('introduction_texts.homepage_line_1') }}
        </p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="container">
        <div class="leaderboard-brands">
            <h2>Top 10 Meest Bekeken 🏆 Handleidingen 🏆</h2>
            <ol>
                @foreach($top10Manuals as $manual)
                    <li>
                        <a href="/{{ $manual->brand_id }}/{{ $manual->brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">
                            {{ $manual->name }}
                        </a>
                        – {{ $manual->visits }} keer bekeken
                    </li>
                @endforeach
            </ol>
        </div>
<<<<<<< HEAD
    </div>
=======

        @php
            $categories = [
                'Telefoons & Mobiele apparaten' => [
                    'ALCATEL Mobile Phones','Apple','BenQ','Huawei','LG Electronics',
                    'Lenovo','Motorola','Palm','Pantech','Samsung','Sony','ZTE'
                ],
                'Computers & Elektronica' => [
                    'AOC','AT&T','Aastra Telecom','Carl Zeiss','Citizen','Dell',
                    'Fujitsu','GE (General Electric)','Garmin','IOGear','Kowa',
                    'Toshiba','Uniden','VTech'
                ],
                'Audio & Geluid' => [
                    'Crown Audio','DCM Speakers','DigiTech','JBL','MTX Audio',
                    'Musica','Pioneer','RCA','Samson','Yamaha'
                ],
                'Specialized / Overige Technologie' => [
                    'Furuno','Grizzly','Humminbird','Kohler','Land Pride',
                    'ProForm','TPI Corporation'
                ]
            ];
        @endphp
>>>>>>> parent of d0e3f43 (fixed footer at homepage)

    <div class="row justify-content-center">
        @foreach($categories as $category)
            <div class="col-md-6 mb-4">
                <div class="category-block">
                    <span class="decor-extra"></span>
                    <h2>{{ $category->name }}</h2>
                    <ul>
                        @foreach($category->brands as $brand)
                            <li>
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
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
