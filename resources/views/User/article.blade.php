@extends('User.layouts.main')

@section('content')

    <body>
        <main>

            @include('User.partials.sideNav')

            <main class="container">
                <section class="search-bar">
                    <form class="search-bar-wrapper" action="{{ route('article') }}" method="get">
                        @csrf
                        <div class="input-wrapper">
                            <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="search" id="search" value="{{ $search }}"
                                placeholder="What do you need?">
                            <button type="submit" name="submit">Search</button>
                        </div>
                        <div class="dropdown">
                            <input type="hidden" name="category" id="category-value">
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
                @if ($articles->count() > 0)
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
                                    <small>{{ $article->release_date }}</small>
                                    <fieldset class="abstract">
                                        <legend>Abstract</legend>
                                        <p>{{ $abstract }}</p>
                                    </fieldset>
                                    <a href="{{ asset('storage/' . $article->pdf) }}" download>
                                        <button class="btn-style-1">Download</button>
                                    </a>
                                    <a href="{{ asset('storage/' . $article->pdf) }}" target="_blank">
                                        <button class="btn-style-1">Read Now</button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </section>
                @else
                    <div class="not-found">
                        <img src="{{ asset('User/Images/Element/not-found.png') }}" alt="">
                        <h3 class="not-found">The journal you are looking for could not be found.</h3>
                    </div>
                @endif
            </main>
        </main>
        <div class="bg-dark-modal"></div>
    @endsection
