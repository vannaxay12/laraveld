<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="B-shop Cart Page">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous"/>

    <title>B-shop Cart</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <!-- Inline CSS for Quick Fixes -->
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar { background-color: #343a40; }
        .navbar-brand h2 { color: #fff; margin: 0; }
        .navbar-brand em { color: #1604ba; font-style: italic; }
        .nav-link { color: #fff !important; }
        .nav-link:hover { color: #faea07 !important; }
        .cart-container { padding: 50px 15px; max-width: 800px; margin: 0 auto; }
        .cart-table { width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .cart-table th, .cart-table td { padding: 15px; text-align: center; border: 1px solid #ddd; }
        .cart-table th { background-color: #343a40; color: #fff; font-weight: 600; }
        .cart-table td { color: #333; }
        .cart-table .total-row td { background-color: #f1f1f1; font-weight: bold; }
        .btn-danger { background-color: #dc3545; border: none; }
        .btn-success { background-color: #28a745; border: none; padding: 10px 20px; margin-top: 20px; }
    </style>
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand"><h2>B-shop <em>ບຸນມີ</em></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('redirect') }}">Home</a>
                        </li> 
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Cart <span class="sr-only">(current)</span></a>
                        </li> 
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('showcart') }}">
                                        <i class="fas fa-shopping-cart"></i> [{{ $count ?? 0 }}]
                                    </a>                  
                                </li>
                                <x-app-layout></x-app-layout>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Cart Section -->
    <div class="cart-container">
        <h1 style="font-size: 24px; text-align: center; margin-bottom: 20px;">ໃບບີນ Order</h1>
        @if (session()->has('message'))
            <div style="text-align: center; color: green; margin-bottom: 20px;">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ url('order') }}" method="POST">
            @csrf 
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $carts)
                        <tr>
                            <td>
                                <input type="hidden" name="productname[]" value="{{ $carts->product_title }}">
                                {{ $carts->product_title }}
                            </td>
                            <td>
                                <input type="hidden" name="quantity[]" value="{{ $carts->quantity }}">
                                {{ $carts->quantity }}
                            </td>
                            <td>
                                <input type="hidden" name="price[]" value="{{ $carts->price }}">
                                {{ str_replace(',', ' ', number_format(floatval($carts->price) * intval($carts->quantity), 3)) }} LAK
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('delete', $carts->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Total Price Row -->
                    <tr class="total-row">
                        <td colspan="2" style="text-align: right;">Total Price:</td>
                        <td>{{ number_format($totalPrice, 3) }} LAK</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-success">Confirm Order</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
</body>
</html>