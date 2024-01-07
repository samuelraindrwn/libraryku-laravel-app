@extends('User.layouts.main')

@section('content')

    <body>

        <main class="signup-container">

            <section class="form-wrapper">
                <img class="line-art-8" src="{{ asset('User/Images/Element/line-art-2-flip.png') }}" alt="">
                <img class="line-art-9" src="{{ asset('User/Images/Element/contact-top.png') }}" alt="">

                <form action="{{ route('password.email') }}" class="myForm" method="POST">
                    @csrf
                    <h1 style="color: var(--secondaryColor);">RESET <span style="color: #ff895d">PASSWORD</span></h1>
                    @if (session()->has('loginError'))
                        <div style="color: red"><b><i>{{ session('loginError') }}</i></b></div>
                    @endif
                    <p>Please enter your email.</p>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-envelope"></i>
                        <input id="email" type="text" name="email" placeholder="Email" required>
                    </div>
                    <button type="submit" name="submit" class="btn-style-2">Confirm</button>
                </form>
            </section>

        </main>
    @endsection
