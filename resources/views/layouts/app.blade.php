<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Vincula tu archivo CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Encabezado (Header) -->
    <header>
        <div class="header-container">
            <h1>ALQUIMIA</h1>
            <nav>
                <ul>
                    <li><a href="/calendar">Fechas</a></li>
                    <li><a href="/shifts">Agregar turnos</a></li>
                    <li><a href="/categories/create">Agregar Categoria</a></li>
                    <li><a href="/dishes/create">Agregar Platillo</a></li>
                    <li><a href="/menus/create">Agregar Menu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container mt-4 mb-4">
            @yield('content')
        </div>
    </main>

    <!-- Pie de página (Footer) -->
    <footer>
        <div class="footer-container">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
            <ul>
                <li><a href="/privacy">Política de privacidad</a></li>
                <li><a href="/terms">Términos y condiciones</a></li>
            </ul>
        </div>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
