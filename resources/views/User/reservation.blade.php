<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }

        h1 {
            font-size: 50px;
            text-align: center;
        }

        .table-wrapper {
            width: 100%;
        }

        table {
            table-layout: fixed;
            border-collapse: collapse;
            border: 3px solid black;
            width: 100%;
            margin-bottom: 30px;
        }

        td {
            width: 100%;
            padding: 10px 20px;
            text-align: center;
            border: 3px solid black;
        }

        h3 {
            font-weight: 600;
        }

        .bottom {
            width: 100%;
            display: flex;
            justify-content: space-between;
            /* align-items: center; */
        }

        .bot-left {
            width: 30%;
        }

        .orange {
            color: hsl(16, 100%, 68%);
        }

        .blue {
            color: #4da6e7;
        }

        i {
            width: 30px;
        }

        footer {
            color: #fff;
            padding: 30px;
            text-align: center;
            background-color: #4da6e7;
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>
        <span class="blue">RESERVATION</span>
        <span class="orange">SUCCESSFUL</span>
    </h1>
    <div class="table-wrapper">
        <h3>Book Information</h3>
        <table border="1">
            <tr>
                <td>Book Title</td>
                <td>Author</td>
                <td>Publisher</td>
                <td>Release Year</td>
            </tr>
            <tr>
                <td>{{ $books->book_title }}</td>
                <td>{{ $books->author }}</td>
                <td>{{ $books->publisher }}</td>
                <td>{{ $books->release_date }}</td>
            </tr>
        </table>
        <h3 style="text-align: left">Rerservation Duration</h3>
        <table border="1">
            <tr>
                <td>Start</td>
                <td>End</td>
                <td>Library</td>
            </tr>
            <tr>
                <td> {{ $reservation->reservation_date }}</td>
                <td> {{ $reservation->return_date }}</td>
                <td> {{ $reservationDetail->library_name }}</td>
            </tr>
        </table>
        <div class="bottom">
            <div class="bot-left">
                <h3>Book Reader</h3>
                <table border="1">
                    <tr>
                        <td>Name</td>
                    </tr>
                    <tr>
                        <td>{{ $reservation->name }}</td>
                    </tr>
                </table>
            </div>
            <div style="margin-top: 50px" class="information">
                <h3>More Information:</h3>
                <p><i class="fa-sharp fa-solid fa-phone"></i> +62 888-7777-8888</p>
                <p>
                    <i class="fa-sharp fa-solid fa-envelope"></i> libraryku@gmail.com
                </p>
            </div>
            <div style="margin-top: 50px" class="reserve-id-wrapper">
                <h3>Reservation Id:</h3>
                <p>#{{ $reservation->reservation_id }}</p>
            </div>
        </div>
        <footer style="margin-top: 50px" id="footer">
            <p class="copy">
                Copyright &copy; <span id="year"></span> LibraryKU. All materials on
                this website are the property of our company.
            </p>
        </footer>
    </div>
</body>

</html>
