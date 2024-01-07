@extends('User.layouts.main')

@section('content')

    <body>

        @include('User.partials.sideNav')

        <main class="container">

            <section class="search-bar">
                <form class="search-bar-wrapper" action="{{ route('search') }}" method="get">
                    @csrf
                    <div class="input-wrapper">
                        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="search" id="search" value="{{ $search }}"
                            placeholder="What do you need?">
                        <button type="submit" name="submit">Search</button>
                    </div>
                    <div class="dropdown">
                        <input type="hidden" id="category-value" name="category">
                        <div id="category" class="input-wrapper">
                            <i class="fa-sharp fa-solid fa-caret-down"></i>
                            <span id="category">Category</span>
                        </div>
                        <div id="category-option" class="option-wrapper">
                            @foreach ($categories as $category)
                                <button type="submit" class="option">{{ $category->categoryName }}</button>
                            @endforeach
                        </div>
                    </div>
                    <div class="dropdown">
                        <input type="hidden" name="sort" id="sort-value">
                        <div id="sort" class="input-wrapper">
                            <i class="fa-sharp fa-solid fa-caret-down"></i>
                            <span id="sort">Sort By</span>
                        </div>
                        <div id="sort-option" class="option-wrapper">
                            <button type="submit" class="option">Newest</button>
                            <button type="submit" class="option">A - Z</button>
                            <button type="submit" class="option">Z - A</button>
                        </div>
                    </div>
                </form>
            </section>

            @if ($books->count() > 0 && $articles->count() > 0)
                <section style="margin-top: 0;" class="list-product-container">
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
                                                <a id="bookmark-text"
                                                    href="{{ route('collection.add', $book->book_id) }}">Add To
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
                </section>

                <section id="journal-container" class="list-product-container">
                    @foreach ($articles as $article)
                        <?php
                        $journalName = $article->article_title;
                        $abstract = $article->abstract;
                        $journalNameLength = strlen($journalName);
                        $abstractLength = strlen($abstract);
                        if ($journalNameLength > 259) {
                            $journalName = substr($journalName, 0, 256) . '...';
                        }
                        
                        if ($abstractLength > 2392) {
                            $abstract = substr($abstract, 0, 2392);
                        }
                        ?>
                        <div class="list-product list-journal">
                            <div class="journal">
                                <h1>{{ $journalName }} </h1>
                                <p>{{ $article->author }}</p>
                                <small>May 2023</small>
                                <fieldset class="abstract">
                                    <legend>Abstract</legend>
                                    <p>{{ $abstract }}</p>
                                </fieldset>
                                <button class="btn-style-1">Download</button>
                                <button class="btn-style-1">Read Now</button>
                            </div>
                        </div>
                    @endforeach
                </section>
            @elseif ($books->count() > 0)
                <section style="margin-top: 0;" class="list-product-container">
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
                                                <a id="bookmark-text"
                                                    href="{{ route('collection.add', $book->book_id) }}">Add To
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
                </section>
            @elseif($articles->count() > 0)
                <section id="journal-container" class="list-product-container">
                    @foreach ($articles as $article)
                        <?php
                        $journalName = $article->article_title;
                        $abstract = $article->abstract;
                        $journalNameLength = strlen($journalName);
                        $abstractLength = strlen($abstract);
                        if ($journalNameLength > 259) {
                            $journalName = substr($journalName, 0, 256) . '...';
                        }
                        
                        if ($abstractLength > 2392) {
                            $abstract = substr($abstract, 0, 2392);
                        }
                        ?>
                        <div class="list-product list-journal">
                            <div class="journal">
                                <h1>{{ $journalName }} </h1>
                                <p>{{ $article->author }}</p>
                                <small>May 2023</small>
                                <fieldset class="abstract">
                                    <legend>Abstract</legend>
                                    <p>{{ $abstract }}</p>
                                </fieldset>
                                <button class="btn-style-1">Download</button>
                                <button class="btn-style-1">Read Now</button>
                            </div>
                        </div>
                    @endforeach
                </section>
            @else
                <div class="not-found">
                    <img src="{{ asset('User/Images/Element/not-found.png') }}" alt="">
                    <h3>The book or journal you are looking for could not be found.</h3>
                </div>
            @endif


        </main>

        <!-- import Custom JavaScript -->
    @endsection
