<!DOCTYPE html>
<html>
<head>
    <title>Your Website</title>
    <!-- Include your CSS and JS files here -->
</head>
<body>
    <header>
        <!-- Include your header content here -->
        @include('header')
    </header>

    <main>
        <!-- Content section -->
        @yield('content')
    </main>

    <footer>
        <!-- Include your footer content here -->
        @include('footer')
    </footer>
</body>
</html>
