<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{{ $page->title }}} - {{{ $settings->sitename }}}</title>    
    <link rel="canonical" href="{{ $page->canonical ? $page->canonnical : URL::current() }}">
    @yield('alternate')
    <meta type="description" content="@yield('meta_description', $settings->meta_description)"/>

{{-- OG and Card Data here --}}
    <meta property="og:site_name" content="{{{ $setting->og_sitename or $settings->sitename }}}">
    <meta property="og:title" content="{{{ $page->og_title or $page->title }}}">
    <meta property="og:url" content="{{ $page->og_url or $page->canonical }}">
    <meta property="og:image" content="">
    @if(isset($settings->fb_appid))
    <meta property="fb:app_id" content="{{$settings->fb_appid}}">
    @endif
    <meta property="og:description" content="{{{ $page->og_description or $page->description }}}">

    {{ HTML::style(asset('css/main'.set_min().'.css')) }}

{{-- Only modernizr at the top --}}
    {{ HTML::script('js/modernizr-2.6.2.min.js') }}
</head>
<body class="frontend">
    <header class="website-header">
        <div class="container">
            <div class="ui basic segment">
                <a class="ui large header website-name" href="{{URL::to('/')}}">{{{ $settings->sitename }}}</a>
            </div>
        </div>
        <nav class="ui inverted tiered menu">
            <div class="container">
                @foreach($pages as $pagex)
                    @if($pagex->nav)
                        <div class="{{ set_active($pagex->slug) }} item">
                            {{ link_to($pagex->slug, $pagex->title) }}
                        </div>
                    @endif
                @endforeach
                <div class="right menu">
                    @yield('rightmenu')
                </div>
            </div>
            @yield('submenu')
        </nav>
    </header>

    <main class="{{$page->slug}}">
        @yield('main')
    </main>
    <footer class="ui secondary segment small">
        <div class="container">
            <p><small>Copyright &copy; {{ date('Y') }} {{ $settings->sitename }} all rights reserved.</small></p>
        </div>
    </footer>
    {{-- Scripts at the bottom --}}
    {{ HTML::script(asset('js/main'.set_min().'.js')) }}

    @if(is_production())
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create',"{{$settings->ga_key}}");ga('send','pageview');
    </script>
    @endif
</body>
</html>
