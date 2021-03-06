<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        {{--<div class="title m-b-md">--}}
        <div>
            <img src="http://cache.media.education.gouv.fr/image/mars2017/22/0/trousse_a_projets_2017-03-29_13-27-52_666_745220.jpg" width="400"/>
            {{--@section('titre')--}}

                <h1>Détails du projet:</h1>

            {{--@endsection--}}

        </div>
        <br>
        <div>
            <h3>Nom du projet: {{$project->project_name}}</h3>
            <h3>Description du projet: {{$project->description}}</h3>
            <h3>Date de création du projet: {{$project->date_of_creation}}</h3>
            <h3>Nom de l'auteur du projet: {{$project->user->name}}</h3>
            <h3><a href="/projectmodif/{{$project->id}}">MODIFIER LE PROJET</a></h3>
            <br>
            <a href="{{ url('/projects') }}">Liste des projets</a>
            <br>
            <br>
            <a href="{{ url('/') }}">Home</a>
        </div>

    </div>
</div>
</body>
</html>
