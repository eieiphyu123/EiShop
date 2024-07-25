<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="{{asset('frontend/css/bootstrap-icons.css')}}" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet" />
        <!-- Splide Slider Link -->
        <link href="{{asset('frontend/css/splide.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('front.index')}}">Ei Shop</a>
                <img src="{{ asset('images/euroBitesLogo.jpg') }}" alt="Logo" class="img-fluid " style="max-width:100px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('front.index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Categories</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                @php
                                    $categories = \App\Models\Category::all();
                                @endphp
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{route('items.category',$category->id)}}" class="dropdown-item">
                                        {{$category->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="{{ route('front.checkout') }}" class="btn btn-outline-dark">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill" id="count_item">0</span>
                        </a>
                    </form>

                    @guest
                        <a href="/login" class="btn max-3">Login</a>
                        <a href="/register" class="btn btn-outline-danger">Register</a>
                    @else
                        <div class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->role=="User")
                                <li><a class="dropdown-item" href="{{route('profile.detail',Auth::user()->id)}}">Profile</a></li>
                                @else
                                <li><a class="dropdown-item" href="{{route('backend.dashboard')}}">Admin Pannel</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{route('logout')}}" method="POST" class="dropdown-item">
                                        @csrf
                                        <button type="submit" class="btn">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('frontend/js/scripts.js')}}"></script>

        <!-- Add to card Js -->
        <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
        <script src="{{asset('frontend/js/addtocart.js')}}"></script>

        <!-- Splide Js -->
        <script src="{{asset('frontend/js/splide.min.js')}}"></script>
        <script src="{{asset('frontend/js/splide.js')}}"></script>

        @yield('script')
    </body>
</html>
