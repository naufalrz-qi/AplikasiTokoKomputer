<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MTC.</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        #myButton {
            width: 48px;
            height: 48px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            /* Awalnya disembunyikan */
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            font-size: 18px;
        }

        #myButton:hover {
            background-color: #0056b3;
        }
    </style>
</head>


<body>
<button id="myButton" class="floating-button"><i class="fas fa-arrow-up"></i></button>

    @include('templates.app.layouts.navbar')

    <main>
        @if (isset($slot) && trim($slot) !== '')
            <!-- Jika slot ada dan tidak kosong, tampilkan konten dari slot -->
            {{ $slot }}
        @elseif(View::hasSection('content'))
            <!-- Jika slot tidak ada, cek apakah section 'content' ada -->
            @yield('content')
        @else
            <!-- Jika tidak ada slot dan tidak ada section 'content', tampilkan konten default -->
            <p>Konten default atau pesan error di sini.</p>
        @endif
    </main>

    @include('templates.app.layouts.footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            // Saat scroll lebih dari 100px dari atas, tombol akan muncul
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#myButton').fadeIn();
                } else {
                    $('#myButton').fadeOut();
                }
            });

            // Ketika tombol diklik, halaman akan scroll ke atas secara smooth
            $('#myButton').click(function() {
                $('html, body').animate({
                        scrollTop: 0
                    }

                    , 50);
                return false;
            });
        });
    </script>
</body>

</html>
