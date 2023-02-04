<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $config['site_title'] }}</title>
    <meta name="description" content="{{ $config['site_description'] }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @font-face {
            font-family: Samim;
            src: url({{ asset('fonts/samim/Samim.ttf') }}) format('truetype');
            font-weight: normal;
        }

        @font-face {
            font-family: Samim;
            src: url({{ asset('fonts/samim/Samim-Bold.ttf') }}) format('truetype');
            font-weight: bold;
        }

        @font-face {
            font-family: Samim;
            src: url({{ asset('fonts/samim/Samim-Medium.ttf') }}) format('truetype');
            font-weight: 500;
        }

        body {
            font-family: 'Samim', sans-serif;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
            <a href="{{ url('/') }}" class="navbar-brand">{{ $config['blog_header'] }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @foreach (App\Models\Category::all() as $category)
                        <a class="nav-item nav-link active"
                            href="{{ route('site.category.show', $category->slug) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </nav>

        <main class="mt-4 container border bg-white rounded">
            <div class="row">
                <div class="col-md-8 p-5">
                    @yield('content')
                </div>
                <div class="col-md-4 p-5">
                    <div>
                        <h1 style='font-size: 16px;'>Categories</h1>
                        <hr>
                        <ul>
                            @foreach (App\Models\Category::get(['name', 'slug']) as $category)
                                <li><a
                                        href="{{ route('site.category.show', $category->slug) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-5">
                        <h1 style='font-size: 16px;'>New Posts</h1>
                        <hr>
                        <ul>
                            @foreach (App\Models\Post::limit(8)->get(['title', 'slug']) as $post)
                                <li><a href="{{ route('site.post.show', $post->slug) }}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="bg-dark text-center text-white container">
        <!-- Grid container -->
        <div class="p-3 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1"
                    href="https://twitter.com/{{ $config['social_twitter'] }}" target="_blank" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1"
                    href="https://www.linkedin.com/in/{{ $config['social_linkdin'] }}" target="_blank"
                    role="button"><i class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1"
                    href="https://github.com/{{ $config['social_github'] }}" target="_blank" role="button"><i
                        class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center pb-3">
            <p class="text-white"> {{ $config['blog_footer'] }}
            </p>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
