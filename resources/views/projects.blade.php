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

                <h1>Liste des projets</h1>

            {{--@endsection--}}

        </div>

        <table>
            <thead>
            <tr>
                {{--<th>ID</th>--}}
                <th>Project Name</th>
                <th>EDIT</th>
                {{--<th>Date of creation</th>--}}
                {{--<th>Author</th>--}}
            </tr>
            </thead>
            <tbody>
                @foreach($Projects as $project)
                    <tr>
                    {{--<td>{{$project->id}}</td>--}}
                    <td>{{$project->project_name}}</td>
                    <td><a href="/projectsedit/{{$project->id}}">détails</a></td>
                    {{--<td>{{$project->description}}</td>--}}
                    {{--<td>{{$project->date_of_creation}}</td>--}}
                    {{--<td>{{$project->author}}</td>--}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a href="{{ url('/') }}">Home</a>

        {{--<div class="links">--}}
            {{--<a href="/projects">Projets</a>--}}
            {{--<a href="https://laracasts.com">Laracasts</a>--}}
            {{--<a href="https://laravel-news.com">News</a>--}}
            {{--<a href="https://forge.laravel.com">Forge</a>--}}
            {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
        {{--</div>--}}
    </div>
</div>
</body>
</html>
