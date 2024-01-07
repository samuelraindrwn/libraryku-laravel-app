@extends('User.layouts.main')

@section('content')

    <body>

        <main class="signup-container">

            <section class="form-wrapper">
                <img class="line-art-8" src="{{ asset('User/Images/Element/line-art-2-flip.png') }}" alt="">
                <img class="line-art-9" src="{{ asset('User/Images/Element/contact-top.png') }}" alt="">

                <form action="{{ route('password.update') }}" class="myForm" method="POST">
                    @csrf
                    <h1 style="color: var(--secondaryColor);">RESET <span style="color: #ff895d">PASSWORD</span></h1>
                    @if (session()->has('loginError'))
                        <div style="color: red"><b><i>{{ session('loginError') }}</i></b></div>
                    @endif
                    <p>Please enter your new password.</p>
                    <div class="input-wrapper">
                        <input type="hidden" name="token" value="{{ request()->token }}">
                        <input type="hidden" name="email" value="{{ request()->email }}">
                        <i class="fa-solid fa-lock"></i>
                        <input id="newPw" type="password" name="password" placeholder="New Password" required>
                    </div>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock"></i>
                        <input id="confPw" type="password" name="password_confirmation" placeholder="Confirm Password"
                            required>
                    </div>
                    <button type="submit" name="submit" class="btn-style-2">Confirm</button>
                </form>
            </section>

        </main>
    @endsection
