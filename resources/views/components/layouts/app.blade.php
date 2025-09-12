<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
    <style>
      body {
        margin: 0; /*  de css niet veranderen pls, het is super fragiel :(  */
      }
      .footer {
        background-color: red;
        padding: 50px;
        width: 100%;
      }
    </style>
</head>
<body>

<x-navbar/>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <x-header/>

            <ul class="breadcrumb">
                <li>
                  <a href="/" title="{{ __('misc.home_alt') }}"
                     alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
                </li>
                {{ $breadcrumb ?? '' }}
            </ul>

            @if ( isset($_GET['q']) )
                <x-search_results/>
            @else
                {{ $slot }}
            @endif

            <ul class="breadcrumb">
                <li>
                    <a href="/" title="{{ __('misc.home_alt') }}"
                       alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
                </li>
                {{ $breadcrumb ?? '' }}
            </ul>
        </div>
    </div> <!-- einde row -->
</div> <!-- einde container -->

<!-- footer buiten container -->
<div class="footer">
    <x-footer></x-footer>
</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
