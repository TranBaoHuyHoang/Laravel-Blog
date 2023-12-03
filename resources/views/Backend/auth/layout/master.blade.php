<!DOCTYPE html>
<html lang="en">

    @include("Backend.includes.header")

    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                @yield('content')
            </div>
        </div>

        @include('Backend.includes.script')

    </body>
</html>
