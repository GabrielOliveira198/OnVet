@include('layouts.templatePDFHeader')
<body style="padding: 90px 0px 25px 0px ">
    <header class="header">
        <table class="border-bottom">
            <tr>
                <td style="width: 180px">
                    <img class="logo" src="{{ asset('images/logo/pata.png') }}" style="max-width: 170px; max-height: 90px;">
                </td>
                <td style="text-align:center">
                    <h1 style="margin-bottom: -4px">
                        {{ isset($header) ? $header :  '' }}
                    </h1>
                    <br>
                    <h2 style="margin-top: -4px">{{ $title }}</h2>
                </td>
            </tr>
        </table>
        <br>
    </header>
    <footer class="footer">
        <hr>
        <table>
            <tbody>
                <tr>
                    <td>
                        <b>{{ config('app.name') }}</b>
                    </td>
                    <td style="text-align:right">
                        <a class="ml-25" href="https://ifgoiano.edu.br/home/index.php" target="_blank">
                            Instituto Federal Goiano
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>
    <main>
        @yield('content')
    </main>
</body>
</html>