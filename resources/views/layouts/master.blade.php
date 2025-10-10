<!DOCTYPE html>
<html class="no-js" lang="">

    @include('layouts.header.header')

    <body>
        @include('layouts.preloader.preloader')

        @yield('content')

        @include('layouts.footer.footer')
    </body>

</html>