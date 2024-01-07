@extends('User.layouts.main')

@section('content')

    <body>
        @include('User.partials.sideNav')

        <main class="container detail">

            <img style="z-index: -1000;" class="line-art-11" src="{{ asset('User/Images/Element/line-art-2.jpg') }}"
                alt="">
            <header id="detail-header">
                <img class="line-art-7" src="{{ asset('User/Images/Element/contact-top.png') }}" width="100%" alt="">
                <button onclick="history.back()" class="btn-back"><i class="fa-sharp fa-solid fa-angle-left"></i></button>
                <h1>Back</h1>
            </header>
            <section class="detail-container">
                <img style="z-index: -10;" class="line-art-11" src="{{ asset('User/Images/Element/line-art-2.jpg') }}"
                    alt="">

                <div class="detail-wrapper-outer">
                    <div class="left-detail">
                        <div class="img-wrapper">
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="">
                        </div>
                        <div class="btn-wrapper">
                            <a href="{{ asset('storage/' . $book->pdf) }}" download>
                                <button class="btn-style-2">Download</button>
                            </a>
                            <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank">
                                <button type="submit" name="submit" class="btn-style-2">Read</button>
                            </a>
                            <button onclick="showModal('reserve-form')" class="btn-style-2">Reserve</button>
                            @if ($inCollection)
                                <button onclick="showModal('del-collection')"
                                    style="color: white; background-color: rgb(228, 71, 71);" class="btn-style-2">
                                    Remove from Collection
                                </button>
                            @else
                                <button onclick="window.location.href = '{{ route('collection.add', $book->book_id) }}'"
                                    class="btn-style-2">Add to Collection</button>
                            @endif
                        </div>
                    </div>
                    <div class="book-detail-wrapper">
                        <h1>{{ $book->book_title }}</h1>
                        <div class="author-wrapper">
                            <h4>Author</h4>
                            <p>{{ $book->author }}</p>
                            <h4>Publisher</h4>
                            <p>{{ $book->publisher }}</p>
                            <h4>Release Year</h4>
                            <p>{{ $book->release_date }}</p>
                            <h4>Number of Pages</h4>
                            <p>{{ $book->page }}</p>
                            <h4>Category</h4>
                            <p>{{ $book->category_id }}</p>
                        </div>
                        <fieldset>
                            <legend>Synopsis</legend>
                            <p>{{ $book->synopsis }}</p>
                        </fieldset>
                    </div>
                </div>
            </section>


        </main>

        <div class="bg-dark-modal"></div>
        <div id="del-collection" class="modal delete">
            <div id="modal-header">
                <h1>
                    <span style="color: var(--secondaryColor) ;">Are</span>
                    <span style="color: var(--orangseSecondaryColor) ;">You</span>
                    Sure?
                </h1>
            </div>
            <div class="modal-body">
                <button onclick="window.location.href = '{{ route('collection.remove', $book->book_id) }}'"
                    class="btn-style-2">Yes</button>
                <button onclick="closeModal('del-collection')" class="btn-style-2 no">No</button>
            </div>
        </div>
        <div id="reserve-form" class="modal">
            <div id="modal-header">
                <h1>
                    <span style="color: var(--secondaryColor) ;">Reservation</span>
                    <span style="color: var(--orangseSecondaryColor) ;">Form</span>
                </h1>
                <button onclick="closeModal('reserve-form')" id="cancel" title="Cancel" class="btn-style-1">X</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reserve.book') }}" class="myForm modalForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $book->book_id }}">
                    <div class="input-wrapper">
                        <p>Book Name</p>
                        <input type="hidden" name="title" value="{{ $book->book_title }}">
                        <input type="text" value="{{ $book->book_title }}" disabled>
                    </div>
                    <div class="input-wrapper">
                        <input type="text" name="name" placeholder="Input Your Name" required>
                    </div>
                    <div class="input-wrapper">
                        <p>Start Time</p>
                        <input id="start-reserve-time"type="date" name="date"placeholder="" required>
                    </div>
                    <div class="dropdown">
                        <div id="duration-time" class="input-wrapper">
                            <span style="color: gray;">Reservation Duration</span>
                        </div>
                        <div id="duration-option" class="option-wrapper">
                            <span onclick="closeDropdown()" class="option">1 Day</span>
                            <span onclick="closeDropdown()" class="option">3 Days</span>
                            <span onclick="closeDropdown()" class="option">5 Days</span>
                            <span onclick="closeDropdown()" class="option">7 Days</span>
                        </div>
                        <input type="hidden" name="duration" id="duration-value" required>
                    </div>

                    <div class="dropdown">
                        <div id="library-destination" class="input-wrapper">
                            <span style="color: gray;">Choose Library</span>
                        </div>
                        <div id="library-option" class="option-wrapper">
                            <span onclick="closeDropdown()" class="option">Indonesia National Library</span>
                            <span onclick="closeDropdown()" class="option">Bunda Hati Kudus Senior High School
                                Library</span>
                            <span onclick="closeDropdown()" class="option">Mutiara Bangsa Senior High School
                                Library</span>
                            <span onclick="closeDropdown()" class="option">Tarsisius Viereta Senior High School
                                Library</span>
                        </div>
                        <input type="hidden" name="location" id="library-value" required>
                    </div>

                    <button type="submit" name="submit" class="btn-style-2">RESERVE</button>
                </form>
            </div>
        </div>
    @endsection
