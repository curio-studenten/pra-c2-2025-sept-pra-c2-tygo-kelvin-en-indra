<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body>
    <style>
.footer {
  background-color: red;
  padding: 50px;
  width: 100%;
  position: fixed;
  left: 0;
  bottom: 0;
}


    </style>

<x-navbar/>
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <x-header/>

            <ul class="breadcrumb">
                <li><a href="/" title="{{ __('misc.home_alt') }}"
                       alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                {{ $breadcrumb ?? '' }}
            </ul>

            @if ( isset($_GET['q']) )
                <x-search_results/>
            @else
                {{ $slot }}
            @endif

            <ul class="breadcrumb">
                <li>
                    <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
                </li>
                {{ $breadcrumb ?? '' }}
            </ul>

        </div>

    </div> <!-- einde row -->

    <div class="footer">
        <x-footer>

        </x-footer>
    </div>

</div> <!-- einde container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>//window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
