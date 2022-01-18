<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap css links --}}
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>
<body>

    @yield('content')

    {{-- bootstrap js links --}}
    <script src="assets/bootstrap/css/bootstrap.bundle.min.js"></script>
</body>
</html>
