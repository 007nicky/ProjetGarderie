<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garderie</title>

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>

    <section>

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('acceuil') }}">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo" style="width:50%;">
            </a>
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCenteredExample"
                    aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                    <!-- Left links -->
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        @if (Auth::guard('admin')->check())

                            <div>

                                <li>{{ Auth::guard('admin')->user()->username }}

                                    <a class="btn btn-outline-primary mr-2" href="{{ route('pageAdmin') }}">Espace
                                        admin</a>


                                    <a class="btn btn-primary" href="{{ route('logout') }}">Se
                                        déconnecter</a>

                                </li>

                            </div>
                        @elseif(Auth::guard('educatrice')->check())

                            <div>
                                <li>{{ Auth::guard('educatrice')->user()->name }}
                                    {{ Auth::guard('educatrice')->user()->lastname }}

                                    <a class="btn btn-outline-primary mr-2"
                                        href="{{ route('pageEducatrice') }}">Espace
                                        educatrice</a>

                                    <a class="btn btn-primary" href="{{ route('logout') }}">Se
                                        déconnecter</a>
                                </li>

                            </div>
                        @else
                            <li> <a class="nav-link" href="{{ route('login') }}">Espace admin</a></li>
                            <li> <a class="nav-link" href="{{ route('logineducatrice') }}">Espace
                                    educatrice</a></li>
                        @endif

                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
    </section>

    @yield('content')
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

</body>

</html>
