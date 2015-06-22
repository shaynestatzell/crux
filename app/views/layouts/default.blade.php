<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$settings->sitename}} - Admin</title>
    {{ HTML::style(asset('css/admin'.set_min().'.css')) }}
    {{ HTML::script('js/modernizr-2.6.2.min.js') }}

    <script src="//cdn.ckeditor.com/4.4.6/standard/ckeditor.js"></script>
</head>
<body>
    @include('layouts.inc.cms-header')
    <main class="main-content">
        @yield('main')
    </main>
    @if(Auth::check())
    <footer class="site-footer container">
        <!-- Footer Content Here -->
    </footer>
    @endif
    {{ HTML::script(asset('js/admin'.set_min().'.js')) }}
</body>
</html>
