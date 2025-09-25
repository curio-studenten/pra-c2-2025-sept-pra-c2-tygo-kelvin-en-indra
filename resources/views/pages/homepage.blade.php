<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h3>Hello, {{ $name }}</h3>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">
        <div class="row justify-content-center">

            @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">
                    <ul>
                        @foreach($chunk as $brand)
                            <?php
                            $current_first_letter = strtoupper(substr($brand->name, 0, 1));
                            if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                echo '</ul>
						<h2>' . $current_first_letter . '</h2>
						<ul>';
                            }
                            $header_first_letter = $current_first_letter
                            ?>
                            <li>
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/"><button>{{ $brand->name }}</button></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <?php unset($header_first_letter); ?>
            @endforeach

        <div class="leaderboard-brands">
             <h2>Top 10 Meest Bekeken 🏆 Handleidingen 🏆</h2>
              <ol>
             @foreach($topManuals as $manual)
                 <li>
                     <a href="/{{ $manual->brand_id }}/{{ $manual->brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">
                          {{ $manual->name }}
                        </a>
                        – {{ $manual->visits }} keer bekeken
                    </li>
             @endforeach
            </ol>
        </div>


        </div>
    </div>
</x-layouts.app>
