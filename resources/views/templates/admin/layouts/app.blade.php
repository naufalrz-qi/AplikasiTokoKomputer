<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - MTC Mitra Komputer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Sidebar Styling */
        .sidebar,
        .offcanvas-body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 15px;
            height: 100vh;
        }

        .sidebar a,
        .offcanvas-body a {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            display: block;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .sidebar a:hover,
        .offcanvas-body a:hover {
            background-color: #fff;
            color: #000;
        }

        /* Collapsed Sidebar Button Styling */
        .collapsed-sidebar {
            display: none;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                display: none;
            }

            .collapsed-sidebar {
                display: block;
            }

            .offcanvas {
                background: linear-gradient(135deg, #6a11cb, #2575fc);
                color: white;
            }
        }

        .offcanvas-header {
            background-color: transparent;
            border-bottom: none;
        }

        .btn-close {
            filter: invert(100%);
        }

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

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (Hidden on small screens) -->
            <div class="col-lg-2 d-none d-lg-block sidebar">
                @include('templates.admin.layouts.navbar')
            </div>

            <!-- Collapsible Sidebar Button (Visible on small screens) -->
            <div class="collapsed-sidebar d-lg-none">
                <button class="btn btn-primary m-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                    <i class="fas fa-bars"></i> Menu
                </button>

                <!-- Offcanvas Sidebar -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar"
                    aria-labelledby="offcanvasSidebarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        @include('templates.admin.layouts.navbar')
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

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
