<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    @vite('resources/js/app.js')
</head>
<body>

    @inertia
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
