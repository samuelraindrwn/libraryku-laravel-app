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
    <link rel="shortcut icon" href="{{ asset('Admin/img/logo.png') }}" type="image/x-icon">
    <title>LibraryKU</title>
</head>

<body>

    <header>
        <h1 id="logo" onclick="window.location.href='{{ route('index') }}'" class="logo">
            Library<span>KU</span>
        </h1>
        <nav>
            <ul>
                <li><a class="active" href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            @if (session()->has('user'))
                <div onclick="window.location.href='{{ route('account') }}'" class="pp-wrapper">
                    <i class="fa fa-user fa-regular"></i>
                    <img src="" alt="">
                </div>
            @else
                <button onclick="window.location.href='{{ route('login') }}'" class="btn-style-1">
                    Log In
                </button>
            @endif

        </nav>
    </header>
    <main>

        <!-- Hero -->
        <section class="hero">
            <img class="line-art-1" src="{{ asset('User/Images/Element/linea-art-1.jpg') }}" alt="" />
            <div class="welcome-text">
                <h3>Welcome to our digital library!</h3>
                <h1>Discover a world of knowledge at your fingertips</h1>
                <p>
                    Explore our vast collection of curated books and articles, conveniently borrow and read from your
                    device. Access a wide range of resources seamlessly integrated with physical libraries. Experience
                    unlimited learning, broaden your horizons, and embark on exciting journeys with LibraryKU. Best of
                    all, it's free! Start your digital reading adventure now!
                </p>
                <button onclick="window.location.href='{{ route('home') }}'" class="btn-style-1">Explore Now</button>
            </div>
            <div class="hero-img-wrapper">
                <img src="{{ asset('User/Images/Element/hero.png') }}" alt="" />
            </div>
        </section>

        <!-- About -->
        <section id="about" class="about">
            <img class="line-art-2" src="{{ asset('User/Images/Element/line-art-3.jpg') }}" alt="" />
            <div class="about-img-wrapper">
                <img src="{{ asset('User/Images/Element/about.png') }}" alt="" />
            </div>
            <div class="about-text-wrapper">
                <h1>About Us <span class="line"></span></h1>
                <h3>
                    What is
                    <span class="logo">Library<span>KU</span></span> ?
                </h3>
                <p>
                    LibraryKU is an innovative digital library platform that offers users book borrowing services and
                    access to a wide collection of over 100+ books and articles. We have a connection to physical
                    libraries, enabling users to enjoy the benefits of a traditional library online. We are proud to
                    provide free services for all our users.
                </p>
                <div class="collection-wrapper">
                    <div class="collection">
                        <h1>100+</h1>
                        <p>Books</p>
                    </div>
                    <div class="collection">
                        <h1>100+</h1>
                        <p>Articles</p>
                    </div>
                </div>
            </div>
        </section>

        <!--  Contact -->
        <section id="contact" class="contact">
            <img class="line-art-4" src="{{ asset('User/Images/Element/line-art-4.jpg') }}" alt="" />
            <img class="line-art-5" src="{{ asset('User/Images/Element/line-art-3.jpg') }}" alt="" />
            <div class="title">
                <h3>CONTACT US</h3>
                <h1>Get In Touch With Us Now</h1>
                <span class="line"></span>
            </div>
            <div class="contact-wrapper">
                <a href="" class="card-contact">
                    <img class="icon-contact" src="{{ asset('User/Images/Element/phone-icon.png') }}" alt="" />
                    <h3>+62 888 - 7777 - 8888</h3>
                </a>
                <a href="mailto:libraryku@gmail.com" class="card-contact">
                    <img class="icon-contact" src="{{ asset('User/Images/Element/email-icon.png') }}" alt="" />
                    <h3>libraryku@gmail.com</h3>
                </a>
                <a href="" class="card-contact">
                    <img class="icon-contact" src="{{ asset('User/Images/Element/location-icon.png') }}"
                        alt="" />
                    <h3>Tangerang, Banten</h3>
                </a>
            </div>
            <img class="line-art-3" src="{{ asset('User/Images/Element/contact-bottom.png') }}" alt="" />
        </section>

    </main>

    <footer id="footer">
        <p class="copy">
            Copyright &copy; <span id="year"></span> LibraryKU. All materials on
            this website are the property of our company.
        </p>
    </footer>

    <!-- import Custom JavaScript -->
    <script src="{{ asset('User/JS/main.js') }}"></script>
    <script src="{{ asset('User/JS/animate.js') }}"></script>

</body>

</html>
