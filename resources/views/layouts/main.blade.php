<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{url( 'css/bootstrap.min.css' )}}>
    <link rel="stylesheet" href={{url( 'css/custom-style.css' )}}>

    <title>Hello, world!</title>
</head>

<body style="overflow-x: hidden;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Laravel - Blogger</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="/">Home</a>
                    <a class="nav-item nav-link" href="/post">Post</a>
                    <span class="nav-item nav-link custom-dropdown">
                        <span>Categories</span>
                        <div class="dropdown-menu shadow">
                            <a class="dropdown-item" href="/post?category=web-programming">Web Programming</a>
                            <a class="dropdown-item" href="/post?category=graphic-design">Graphic Design</a>
                        </div>
                    </span>

                </div>
                <div class="navbar-nav w-100 d-flex justify-content-end">
                    <a class="nav-item text-white btn btn-sm btn-link" href="/register">Register</a>
                    <span class="mx-2"></span>
                    <a class="nav-item btn btn-sm btn-warning" href="/login">Log in</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <footer>
        <div class="row mt-5">

        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script src={{ url('js/bootstrap.min.js') }}></script>
</body>

</html>