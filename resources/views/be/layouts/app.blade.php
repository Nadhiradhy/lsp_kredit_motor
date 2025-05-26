
<!DOCTYPE html>
<html lang="en">
<head>
    @include('be.components.head')
</head>
<body>
    <body class="app">
        @include('be.components.navbar')
        <main>
            @yield('content')
        </main>
    </body>

    @include('be.components.script')
    @include('be.components.footer')
</body>
</html>