<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
    <style>
      body {
        margin: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }
      .container {
        margin: 0 auto;
      }

      .footer {
        background-color: gainsboro;
        padding: 30px;
        width: auto;
        margin-top: auto;
      }

    .leaderboard-brands {
      font-size: 0.75rem;
      height: 200px;
      background-color: #e9ecef;
      padding: 5px;
      overflow-y: auto;
      column-count: 3;
      column-gap: 2rem;
      margin-top: 1rem;
      margin-bottom: 1rem;
  }

  .leaderboard-brands h2 {
      column-span: all;
      text-align: center;
      margin-bottom: 1rem;
  }

  .leaderboard-brands ol {
      margin: 0;
      padding: 0 1rem;
  }

  .leaderboard-brands li {
      margin-bottom: 5px;
      break-inside: avoid;
  }
    </style>
</head>
<body>

<x-navbar/>

<div class="container">
    <div class="row justify-content-center">
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
    </div>
</div>

<div class="footer">
    <x-footer></x-footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
