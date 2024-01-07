<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- import Custom CSS -->
    <link rel="stylesheet" href="{{ asset('User/CSS/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/CSS/lineArtBg.css') }}" />
    <link rel="stylesheet" href="{{ asset('User/CSS/animate.css') }}" />

    <!-- import font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- import jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{ asset('User/CSS/owl.carousel.min.css') }}">
    <script src="{{ asset('User/JS/owl.carousel.min.js') }}"></script>

    <title>LibraryKU | {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('Admin/img/logo.png') }}" type="image/x-icon">
</head>

@yield('content')
@include('user.partials.flash')
<!-- import Custom JavaScript -->
<script src="{{ asset('User/JS/main.js') }}"></script>
<script src="{{ asset('User/JS/animate.js') }}"></script>

</body>

</html>
