@extends('User.layouts.main')

@section('content')

    <body>
        @include('User.partials.sideNav')
        <main class="container">
            <section class="hero-home">
                <div class="hero-home-text-wrapper">
                    <h1>Welcome to our library! <br> We are thrilled to have you here.</h1>
                    <p>Discover our curated collection of books and articles, borrow and read conveniently from your
                        device. Seamlessly access resources from physical libraries, expand your horizons, and embark on a
                        limitless learning journey with LibraryKU. Best of all, it's free! Start your digital reading
                        adventure now!
                    </p>
                </div>
                <button onclick="window.location.href = '{{ route('books') }}'" class="btn-style-1">Explore Now</button>
            </section>
            <img class="line-art-11" src="{{ asset('User/Images/Element/line-art-2.jpg') }}" alt="">
            <img class="line-art-10" src="{{ asset('User/Images/Element/line-art-2-flip.png') }}" alt="">

            <section class="search-bar">
                <form class="search-bar-wrapper" action="{{ route('search') }}" method="get">
                    @csrf
                    <div class="input-wrapper">
                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="search" id="search" placeholder="What do you need?">
                        <button>Search</button>
                    </div>
                </form>
            </section>

            <section class="slider-container">
                <img class="line-art-10" src="{{ asset('User/images/Element/linea-art-1.jpg') }}" alt="">
                <img class="line-art-12" src="{{ asset('User/images/Element/line-art-3.jpg') }}" alt="">
                <div class="title">
                    <h3>TOP RATED</h3>
                    <h1>Popular Books That <span> Everyone's</span> <span>Reading</span> </h1>
                    <span class="line"></span>
                </div>
                <div class="card-container ">
                    <div class="card-wrapper owl-carousel">
                        @foreach ($popularBooks as $book)
                            <div onclick="window.location.href ='{{ route('details.id', $book->book_id) }}' "
                                class="card-product">
                                <div class="product-wrapper">
                                    <div class="img-wrapper">
                                        <img src="{{ asset('storage/' . $book->cover) }}" alt="">
                                        <div class="black-bars">
                                            @if (in_array($book->book_id, $inCollection))
                                                <i id="bookmark-icon" class="fa-sharp fa-solid fa-bookmark"></i>&nbsp;
                                                <a id="bookmark-text" name="submit"
                                                    href="{{ route('collection.remove', $book->book_id) }}">Remove
                                                    From
                                                    Collection</a>
                                            @else
                                                <i id="bookmark-icon" class="fa-sharp fa-regular fa-bookmark"></i>&nbsp;
                                                <a id="bookmark-text"
                                                    href="{{ route('collection.add', $book->book_id) }}">Add
                                                    To
                                                    Collection</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="detail-wrapper">
                                        <div class="books-name-wrapper">
                                            <?php 

                                    $bookName = $book->book_title;
                                    $booksNameLength = strlen($bookName);
                                    
                                    if($booksNameLength > 41){
                                        $shortenedName = substr($bookName, 0, 38) . '...';
                                    ?>
                                            <h1>
                                                <?= $shortenedName ?>
                                            </h1>
                                            <?php } else {?>
                                            <h1><?= $bookName ?></h1>
                                            <?php }?>
                                        </div>
                                        <p>{{ $book->author }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="list-product-container">
                <div class="title">
                    <h3>MOST SEARCH</h3>
                    <h1>Boundless <span>Book</span> <span>Adventures</span> Await</h1>
                    <span class="line"></span>
                </div>
                <div class="list-product">
                    @foreach ($books as $book)
                        <div onclick="window.location.href ='{{ route('details.id', $book->book_id) }}' "
                            class="card-product">
                            <div class="product-wrapper">
                                <div class="img-wrapper">
                                    <img src="{{ asset('storage/' . $book->cover) }}" alt="">
                                    <div class="black-bars">
                                        @if (in_array($book->book_id, $inCollection))
                                            <i id="bookmark-icon" class="fa-sharp fa-solid fa-bookmark"></i>&nbsp;
                                            <a id="bookmark-text" name="submit"
                                                href="{{ route('collection.remove', $book->book_id) }}">Remove
                                                From
                                                Collection</a>
                                        @else
                                            <i id="bookmark-icon" class="fa-sharp fa-regular fa-bookmark"></i>&nbsp;
                                            <a id="bookmark-text" href="{{ route('collection.add', $book->book_id) }}">Add
                                                To
                                                Collection</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="detail-wrapper">
                                    <div class="books-name-wrapper">
                                        <?php
                                    $bookName = $book->book_title;
                                    $booksNameLength = strlen($bookName);
                                    if($booksNameLength > 41){
                                        $shortenedName = substr($bookName, 0, 38) . '...';?>
                                        <h1>
                                            <?= $shortenedName ?>
                                        </h1>
                                        <?php } else {?>
                                        <h1>
                                            <?= $bookName ?>
                                        </h1>
                                        <?php }?>
                                    </div>
                                    <p>{{ $book->author }}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button onclick="window.location.href = '{{ route('books') }}';" class="btn-style-1">See More</button>
            </section>

            <section class="list-product-container">
                <div class="title">
                    <h3>EDUCATION BOOKS</h3>
                    <h1>Discover, Learn, and <span>Grow with</span><span> Books!</span></h1>
                    <span class="line"></span>
                </div>
                <div class="list-product">
                    @foreach ($bookschild as $bookchild)
                        <div onclick="window.location.href ='{{ route('details.id', $book->book_id) }}' "
                            class="card-product">
                            <div class="product-wrapper">
                                <div class="img-wrapper">
                                    <img src="{{ asset('storage/' . $bookchild->cover) }}" alt="">
                                    <div class="black-bars">
                                        @if (in_array($book->book_id, $inCollection))
                                            <i id="bookmark-icon" class="fa-sharp fa-solid fa-bookmark"></i>&nbsp;
                                            <a id="bookmark-text" name="submit"
                                                href="{{ route('collection.remove', $bookchild->book_id) }}">Remove
                                                From
                                                Collection</a>
                                        @else
                                            <i id="bookmark-icon" class="fa-sharp fa-regular fa-bookmark"></i>&nbsp;
                                            <a id="bookmark-text"
                                                href="{{ route('collection.add', $bookchild->book_id) }}">Add
                                                To
                                                Collection</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="detail-wrapper">
                                    <div class="books-name-wrapper">
                                        <?php 

                                    $bookName = $bookchild->book_title;
                                    $booksNameLength = strlen($bookName);
                                    
                                    if($booksNameLength > 21){
                                        $shortenedName = substr($bookName, 0, 18) . '...';
                                    ?>
                                        <h1>
                                            <?= $shortenedName ?>
                                        </h1>
                                        <?php } else {?>
                                        <h1><?= $bookName ?></h1>
                                        <?php }?>
                                    </div>
                                    <p>{{ $bookchild->author }}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button onclick="window.location.href = '{{ route('books') }}';" class="btn-style-1">See More</button>
            </section>

        </main>
        <div class="bg-dark-modal"></div>
    @endsection
