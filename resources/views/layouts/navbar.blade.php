<!DOCTYPE html>
<html lang="en">
<head>
      <style>
    #sidebar {
      transition: transform 0.3s ease;
    }
    .sidebar-hidden {
      transform: translateX(-100%);
    }
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body >
    <img src="assets/image/home.png" style="margin-top: 2%; width: 2%; margin-left: 5%; " alt="">
    <form class="d-flex"  role="search">
        <input class="form-control me-2" style="border-color:gray; margin-left: 8%; margin-top: -2%; width: 70%;" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-success " style="margin-top: -2%;" type="submit">search</button>
    </form>
            <div class="container mt-4">
        @yield('content')
    </div>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>