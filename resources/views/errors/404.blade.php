<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <title>404</title>

    <style id="" media="all">
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box
    }

    body {
        background-color: rgba(17, 24, 39);
        padding: 0;
        margin: 0
    }

    .home {
        font-family: cabin, sans-serif;
        font-size: 1.5rem;
        color: white;
        text-decoration: none;
    }

    .home:hover {
        transition: 0.3s;
        color: #516078;
    }

    #notfound {
        position: relative;
        height: 100vh
    }

    #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%)
    }

    .notfound {
        max-width: 520px;
        width: 100%;
        /* line-height: 1.4; */
        text-align: center
    }

    .notfound .notfound-404 {
        position: relative;
        height: 240px;
        z-index: -1;
    }

    .notfound .notfound-404 h1 {
        font-family: montserrat, sans-serif;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 252px;
        font-weight: 900;
        margin: 0;
        color: white;  
    }

    .notfound .notfound-404 p {
        font-family: cabin, sans-serif;
        position: relative;
        font-size: 18px;
        font-weight: 500;
        color: white;
        margin: 0;
        letter-spacing: 1px;
        padding-bottom: 2rem;
    }

    @media only screen and (max-width: 767px) {
        .notfound .notfound-404 {
            height: 200px
        }

        .notfound .notfound-404 h1 {
            font-size: 200px
        }
    }

    @media only screen and (max-width: 480px) {
        .notfound .notfound-404 {
            height: 162px
        }

        .notfound .notfound-404 h1 {
            font-size: 162px;
            height: 150px;
            /* line-height: 162px */
        }

        .notfound h2 {
            font-size: 16px
        }


    }
    </style>
    <meta name="robots" content="noindex, follow">
</head>

<body class="antialiased dark">
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <p>Ne pare rău! Pagina nu există!</p>
                <h1><span>4</span><span>0</span><span>4</span></h1>
            </div>
            <a href="{{ route('welcome') }}" class="home">Întoarce-te la pagina principală!</a>
        </div>
    </div>
</body>

</html>