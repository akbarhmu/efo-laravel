<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/img/efo-logo.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>@yield('title') | Election for Everyone</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            @yield('content')
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <img src="{{ asset('assets/img/efo-logo.png') }}" class="image" alt="" />
                <h1>EFO</h1>
            </div>
        </div>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/script.js"></script>
</body>
</html>
