<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garderie</title>

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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

        <div class='container-fluid position-absolute mt-5 bottom-0 end-0'>
            <div class="card">
                <div class="heading text-center">
                    <div class="head1">Garderie du soleil</div>
                    <p class="bdr"></p>
                </div>
                <div class="card-body">
                    <div class="row m-0 pt-5">
                        <div class="card col-12 col-md-3">
                            <div class="card-content"><i class="fas fa-user-graduate fa-3x"></i></i>
                                <div class="card-title"> FUTUR LEADER </div>
                                <p><small>La réussite de votre enfant est garantie chez nous</small></p>
                            </div>
                        </div>
                        <div class="card col-12 col-md-3">
                            <div class="card-content"> <i class="far fa-handshake fa-3x"></i>
                                <div class="card-title"> GARANTIE </div>
                                <p><small>Nous offrons les meilleurs services de garderie depuis 20ans</small></p>
                            </div>
                        </div>
                        <div class="card col-12 col-md-3">
                            <div class="card-content"> <i class="fas fa-mobile-alt fa-3x"></i>
                                <div class="card-title"> SUIVIE JOURNALIER </div>
                                <p><small>Suivez en tout temps la progression de votre enfant</small></p>
                            </div>
                        </div>
                        <div class="card col-12 col-md-3">
                            <div class="card-content"> <i class="fas fa-dice fa-3x"></i>
                                <div class="card-title"> ACTIVITES INTERACTIVES </div>
                                <p><small>Nos activités aident à développer les compétences de votre enfant</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer row m-0" id="lastfooter">
                    <p> <label> <i class="fas fa-phone fa-rotate-90 text-primary"></i> </label> 800-000-0000</p>
                    <div>
                        <p> <small class="follow-text">NOUS SUIVRE</small> <label class="footer-right"> <i
                                    class="fab fa-instagram"></i> <i class="fab fa-facebook-square"></i> <i
                                    class="fab fa-linkedin"></i> <i class="fab fa-twitter-square"></i> </label> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <p class="position-absolute top-50 start-50 translate-middle">Admin <strong> Username:admin, password:admin</strong>
    </p>
    <p class="position-absolute bottom-50 start-50 translate-middle">Educatrice<strong> nom:edu1, prenom:edu1,
            password:edu1</strong></p>

    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

</body>



</html>
