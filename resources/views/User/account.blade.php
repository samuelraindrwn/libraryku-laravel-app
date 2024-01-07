@extends('User.layouts.main')

@section('content')

    <body>

        <main>
            @include('User.partials.sideNav')
            <main id="account-container" class="container">

                <section id="account-wrapper" class="form-wrapper">
                    <div class="account-form-wrapper">
                        @if ($true)
                            <form action="{{ route('updateProfile') }}" class="myForm" method="post">
                                @csrf
                                <h1 style="color:
                                var(--secondaryColor); font-size:26pt">
                                    ACCOUNT <span style="color: #ff895d">INFORMATION</span>
                                </h1>
                                <p>Status: {{ $user->role }}</p>
                                <div class="name">
                                    <div class="input-wrapper">
                                        <input id="firstname" name="firstname" type="text" placeholder="Firstname"
                                            value="{{ $user->firstname }}" required>
                                    </div>
                                    <div class="input-wrapper">
                                        <input id="lastname" name="lastname" type="text" placeholder="Lastname"
                                            value="{{ $user->lastname }}" require>
                                    </div>
                                </div>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-cake-candles"></i>
                                    <input title="Birth of Date" type="date" id="dob" name="dob" placeholder=""
                                        value="{{ $user->dob }}" required>
                                </div>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}"
                                        required>
                                </div>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-user"></i>
                                    <input type="text" name="username" placeholder="Username"
                                        value="{{ $user->username }}" required>
                                </div>
                                <div style="display: flex; gap: 20px;" class="btn-wrapper">
                                    <button id="submit-edit" type="submit" name="submit" class="btn-style-2">Edit
                                        Information</button>
                                    <button onclick="event.preventDefault(), window.location.href='{{ route('account') }}';"
                                        class="btn-style-2 no">Cancel</button>
                                </div>
                            </form>
                        @else
                            <form action="" class="myForm" method="post">
                                <h1 style="color: var(--secondaryColor); font-size:26pt">ACCOUNT <span
                                        style="color: #ff895d">INFORMATION</span>
                                </h1>
                                <p>Status: {{ $user->role }}</p>
                                <div class="name">
                                    <div class="input-wrapper">
                                        <input id="firstname" name="firstname" type="text" placeholder="Firstname"
                                            value="{{ $user->firstname }}" disabled required>
                                    </div>
                                    <div class="input-wrapper">
                                        <input id="lastname" name="lastname" type="text" placeholder="Lastname"
                                            value="{{ $user->lastname }}"disabled require>
                                    </div>
                                </div>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-cake-candles"></i>
                                    <input title="Birth of Date" type="date" id="dob" name="dob" placeholder=""
                                        value="{{ $user->dob }}" disabled required>
                                </div>
                                <?php
                                
                                $email = $user->email;
                                
                                $emailSensor = str_repeat('*', strpos($email, '@')) . substr($email, strpos($email, '@'));
                                
                                ?>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Email" value="<?= $emailSensor ?>"
                                        disabled required>
                                </div>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-user"></i>
                                    <input type="text" name="username" placeholder="Username"
                                        value="{{ $user->username }}" disabled required>
                                </div>

                                <button onclick="event.preventDefault(), showModal('cek-pw')" class="btn-style-2">Edit
                                    Information</button>
                            </form>
                        @endif

                        <form action="{{ route('changePassword') }}" class="myForm" method="post">
                            @csrf
                            <div class="pass-settings">
                                <p>PASSWORD SETTINGS</p>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock"></i>
                                    <input type="password" name="password" placeholder="Current Password" required>
                                </div>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock"></i>
                                    <input type="password" name="new_password" placeholder="New Password" required>
                                </div>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-lock"></i>
                                    <input type="password" name="conf_password" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn-style-2">Change Password</button>
                            <a href="{{ route('forgot-password') }}" target="_blank">Forgot Password?</a>
                        </form>
                    </div>
                    @if ($user->role == 'student')
                        <img src="{{ asset('User/Images/Element/account.png') }}" alt="">
                    @else
                        <div class="upload-container">
                            <div class="upload-btn-wrapper">
                                <button class="btn-style-2 active">Upload Book</button>
                                <button class="btn-style-2">Upload Journal</button>
                            </div>
                            <form id="uploadBookForm" action="{{ route('book.create') }}" class="myForm active"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <p>*Please Input Book Information</p>
                                <div class="upload-form-wrapper">
                                    <div class="input-wrapper">
                                        <input type="text" placeholder="ISBN" name="book_id" maxlength="13" required>
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="text" placeholder="Book Name" name="book_title" required>
                                    </div>
                                    <div class="name">
                                        <div class="input-wrapper">
                                            <input type="text" placeholder="Book Author" name="author" required>
                                        </div>
                                        <div class="input-wrapper">
                                            <input type="text" placeholder="Book Publisher" name="publisher" required>
                                        </div>
                                    </div>
                                    <div class="name">
                                        <div class="input-wrapper">
                                            <p>Release Date</p>
                                            <input type="date" placeholder="" name="release_date" required>
                                        </div>
                                        <div class="input-wrapper">
                                            <input type="number" placeholder="Number of Pages" name="page" required>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <div id="category-book" class="input-wrapper">
                                            <span style="color: gray;">Category</span>
                                        </div>
                                        <div id="book-option" class="option-wrapper">
                                            @foreach ($category as $cate)
                                                <span onclick="closeDropdown()"
                                                    class="option">{{ $cate->categoryName }}</span>
                                            @endforeach
                                        </div>
                                        <input type="hidden" id="cate-value-book" name="categoryName" required>
                                    </div>
                                    <div class="input-wrapper">
                                        <textarea name="synopsis" cols="30" rows="5" placeholder="Synopsis" required></textarea>
                                    </div>
                                    <input type="file" id="bookUpload" class="hideFile" accept="application/pdf"
                                        name="pdf" placeholder="" required>
                                    <div class="choose-file-wrapper">
                                        <p>Choose File (PDF)</p>
                                        <div class="bot">
                                            <label class="uploadBtn" for="bookUpload" style="text-align: center;">Choose
                                                File</label>
                                            <h3 id="fileName-book"></h3>
                                        </div>
                                    </div>
                                    <input type="file" id="bookUpload-img" class="hideFile"
                                        accept="image/jpeg, image/png" name="cover" placeholder="" required>
                                    <div class="choose-file-wrapper">
                                        <p>Choose Image (JPG, JPEG, OR PNG)</p>
                                        <div class="bot">
                                            <label class="uploadBtn" for="bookUpload-img"
                                                style="text-align: center;">Choose
                                                Image</label>
                                            <h3 id="fileName-book-img"></h3>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="btn-style-2">Upload</button>
                                </div>
                            </form>
                            <form id="uploadArticleForm" action="{{ route('article.create') }}" class="myForm"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <p>*Please Input Article Information</p>
                                <div class="upload-form-wrapper">
                                    <div class="input-wrapper">
                                        <input type="text" placeholder="Article Name" name="article_title" required>
                                    </div>
                                    <div class="input-wrapper">
                                        <input type="text" placeholder="Article Author" name="author" required>
                                    </div>
                                    <div class="name">
                                        <div class="input-wrapper">
                                            <p>Release Date</p>
                                            <input type="date" placeholder="" name="release_date" required>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <div id="category-article" class="input-wrapper">
                                            <span style="color: gray;">Category</span>
                                        </div>
                                        <div id="article-option" class="option-wrapper">
                                            @foreach ($category as $cate)
                                                <span onclick="closeDropdown()"
                                                    class="option">{{ $cate->categoryName }}</span>
                                            @endforeach
                                        </div>
                                        <input type="hidden" id="cate-value-article" name="categoryName" required>
                                    </div>
                                    <div class="input-wrapper">
                                        <textarea name="abstract" cols="30" rows="9" placeholder="Abstract" name="abstract" required></textarea>
                                    </div>
                                    <input type="file" id="articleUpload" class="hideFile"
                                        accept="application/pdf"name="pdf" placeholder="">
                                    <div class="choose-file-wrapper">
                                        <p>Choose File (PDF)</p>
                                        <div class="bot">
                                            <label class="uploadBtn" for="articleUpload"
                                                style="text-align: center;">Choose
                                                File</label>
                                            <h3 id="fileName-article"></h3>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit"class="btn-style-2">Upload</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </section>

            </main>

        </main>

        <div class="bg-dark-modal"></div>
        <div id="cek-pw" class="modal modalForm">
            <div id="modal-header">
                <h1>
                    Enter
                    <span style="color: var(--secondaryColor) ;"> Your</span>
                    <span style="color: var(--orangseSecondaryColor) ;"> Password</span>
                </h1>
                <button onclick="closeModal('cek-pw')" id="cancel" title="Cancel" class="btn-style-1">X</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('account') }}" class="myForm" method="get">
                    @csrf
                    <div class="input-wrapper">
                        <label for="pw">Password</label>
                        <input type="hidden" name="confirm" value="confirm account">
                        <input id="pw" type="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn-style-2">Submit</button>
                </form>
            </div>
        </div>
    @endsection
