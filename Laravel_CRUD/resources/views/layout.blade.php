
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <nav class="nav-bar">
        <h1>
            <h1>Flying Pickles Juggling Pianos in the Underwater Desert of Nachos</h1>
        </h1>
        <li class="nav-link-wrap">
            <a class="nav-link" style="text-decoration: none;" href="/">Ana Sayfa</a>
            <a class="nav-link" style="text-decoration: none;" href="/about">Hakkımızda</a>
            <!-- <a class="nav-link" style="text-decoration: none;" href="/contact">İletişim</a> -->
            <a class="nav-link" style="text-decoration: none;" href="/form">İletişim</a>
            <a class="nav-link" style="text-decoration: none;" href="/messages">Mesajlar</a>
        </li>
    </nav>
    <section class="section-s">
        @yield('main')
        <div class="mb-3"></div>
    </section>
    <footer class="footer-bar">
        <h5>© 2024 by Furkan Selçuk. All Rights Reserved.</h5>
    </footer>
</body>
</html>