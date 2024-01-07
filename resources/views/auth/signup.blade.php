@extends('User.layouts.main')

@section('content')

    <body>

        <main class="signup-container">
            <section class="signup-wrapper">
                <section class="role-wrapper">
                    <img class="line-art-4" src="{{ asset('User/Images/Element/line-art-4.jpg') }}" alt="">
                    <img class="line-art-2" src="{{ asset('User/Images/Element/line-art-2.jpg') }}" alt="">
                    <section class="top">
                        <h1>WHO ARE <span style="color: var(--secondaryColor)">YOU?</span></h1>
                    </section>
                    <section class="bottom">
                        <div id="teacher" class="role-card">
                            <img width="250px" src="{{ asset('User/Images/Element/teacher.png') }}" alt="">
                            <img class=" line-art-6" src="{{ asset('User/Images/Element/contact-bottom.png') }}"
                                alt="">
                            <h3>TEACHER</h3>
                        </div>
                        <div id="student" class="role-card">
                            <img width="250px" src="{{ asset('User/Images/Element/toga.png') }}" alt="">
                            <img class="line-art-7" src="{{ asset('User/Images/Element/contact-top.png') }}" alt="">
                            <h3>STUDENT</h3>
                        </div>
                    </section>
                    <button onclick="history.back()" class="btn-style-1 back">Back</button>
                </section>

                <section class="form-wrapper">
                    <img class="line-art-8" src="{{ asset('User/Images/Element/line-art-2-flip.png') }}" alt="">
                    <button class="btn-style-1 back back-toRole">Back</button>
                    <form action="{{ route('create.user') }}" class="myForm" method="post">
                        @csrf
                        <input type="hidden" name="role" id="role-value" value="">
                        <h1 style="color: var(--secondaryColor);">SIGN <span style="color: #ff895d">UP</span></h1>
                        <p>Already Have Account? <a href="{{ url('/login') }}">Login Now</a></p>
                        <div class="name">
                            <div class="input-wrapper">
                                <label for="firstname">Firstname</label>
                                <input id="firstname" name="firstname" type="text">
                            </div>
                            <div class="input-wrapper">
                                <label for="lastname">Lastname</label>
                                <input id="lastname" name="lastname" type="text">
                            </div>
                        </div>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-cake-candles"></i>
                            <input title="Birth of Date" type="date" id="dob" name="dob" value=""
                                placeholder="">
                        </div>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="username" placeholder="Username" maxlength="10">
                        </div>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="confpassword" placeholder="Confirm Password">
                        </div>
                        <button type="submit" name="submit" class="btn-style-2">Sign Up</button>
                    </form>
                </section>
            </section>

        </main>
    @endsection
