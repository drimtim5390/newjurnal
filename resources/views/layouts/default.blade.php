<html>
<head>
    @include('includes.head')
</head>
<body>
<div>

    <header>
        @include('includes.header')
    </header>

    <div style="margin: 70px 30px 40px 30px;">

        @yield('content')

    </div>

    <footer>
        @include('includes.footer')
    </footer>

</div>
    @include('includes.jss')
</body>
</html>