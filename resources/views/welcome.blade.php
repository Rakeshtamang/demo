<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
        /* Internal CSS */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: black;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #333;
        }

        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>

    <!-- HTML -->
    <div class="navbar">
        <a class="active" href="#home">Khatabook</a>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/index') }}">Register</a>
        <a href="{{ url('/index/view') }}">Customer</a>
    </div>
    @yield('content')

</body>

</html>
