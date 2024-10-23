
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav-bar">
        <h1>
            Boş sayfamıza hoş geldiniz.
        </h1>
        <li class="nav-link-wrap">
            <a class="nav-link" style="text-decoration: none;" href="/">Ana Sayfa</a>
            <a class="nav-link" style="text-decoration: none;" href="/about">Hakkımızda</a>
            <a class="nav-link" style="text-decoration: none;" href="/contact">İletişim</a>
            <a class="nav-link" style="text-decoration: none;" href="/form">Form</a>
        </li>
    </nav>
    <section class="section-s">
        @yield('main')
    </section>
    <footer class="footer-bar">
        <h1>
            Boş sayfamıza hoş geldiniz.
        </h1>
    </footer>
</body>
</html>