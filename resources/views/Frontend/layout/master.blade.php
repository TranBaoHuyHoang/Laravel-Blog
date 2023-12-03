<!DOCTYPE html>
<html lang="en">

@include("Frontend.includes.header")

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif

    {{-- Navigation top --}}
    @include("Frontend.includes.nav")
    {{-- End Navigation top --}}

    <!-- page-header -->
    <header class="page-header"></header>
    <!-- end of page header -->

    <div class="container">

        {{-- Session banner --}}
        @yield('session')
        {{-- End session banner --}}

        <hr>

        {{-- Page content --}}

        <div class="page-container">
            {{-- Content --}}
            @yield('content')
            {{-- End Content --}}

            <!-- Sidebar -->
            @yield('sidebar')
            {{-- End Sidebar --}}

        </div>

        {{-- End Page content --}}

    </div>

    <!-- Page Footer -->
    @yield('footer')
    <!-- End of Page Footer -->


    {{-- Script --}}
    @include("Frontend.includes.script")

</body>
</html>
