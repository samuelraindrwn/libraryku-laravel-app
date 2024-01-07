@extends('User.layouts.main')

@section('content')

    <body>

        <main class="signup-container">

            <section class="form-wrapper">
                <img class="line-art-8" src="{{ asset('User/Images/Element/line-art-2-flip.png') }}" alt="">
                <img class="line-art-9" src="{{ asset('User/Images/Element/contact-top.png') }}" alt="">

                <form action="{{ route('login') }}" class="myForm" method="post">
                    @csrf
                    <h1 style="color: var(--secondaryColor);">LOG<span style="color: #ff895d">IN</span></h1>
                    <p>Don't Have Account? <a href="{{ route('signup') }}">Create Account</a></p>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-user"></i>
                        <input id="username" type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password" type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn-style-2">Login</button>
                    <div class="remember-wrapper">
                        <div class="remember">
                            <input id="remember" name="remember" type="checkbox">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </form>
            </section>

        </main>
    @endsection
