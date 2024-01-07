@extends('User.layouts.main')

@section('content')

    <body>

        <main>
            @include('User.partials.sideNav')

            <main class="container">

                <section class="search-bar">
                    <form class="search-bar-wrapper" action="{{ route('Collection.index') }}" method="get">
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

                @if ($collections->count() > 0)
                    <section style="margin-top: 0;" class="list-product-container">
                        <div class="title">
                            <h3>COLLECTIONS</h3>
                            <h1>Unforgettable Tales, Preserved in Your <span>Book</span> <span>Collection</span> of Choice!
                            </h1>
                            <span class="line"></span>
                        </div>
                        <div class="list-product">
                            @foreach ($collections as $collection)
                                <div onclick="window.location.href ='{{ route('details.id', $collection->book_id) }}' "
                                    class="card-product">
                                    <div class="product-wrapper">
                                        <div class="img-wrapper">
                                            <img src="{{ asset('storage/' . $collection->cover) }}" alt="">
                                            <div class="black-bars">
                                                <i id="bookmark-icon" class="fa-sharp fa-solid fa-bookmark"></i>&nbsp;
                                                <a id="bookmark-text" name="submit"
                                                    href="{{ route('collection.remove', $collection->book_id) }}">Remove
                                                    From
                                                    Collection</a>
                                            </div>
                                        </div>
                                        <div class="detail-wrapper">
                                            <div class="books-name-wrapper">
                                                <?php 

                                                $bookName = $collection->book_title;
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
                                            <p>{{ $collection->author }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @else
                    <div class="not-found">
                        <img src="User/Images/Element/not-found.png" alt="">
                        <h3 class="not-found">There are no collections yet.</h3>
                    </div>
                @endif
            </main>

        </main>
        <div class="bg-dark-modal"></div>
    @endsection
