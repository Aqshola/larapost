<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Larapost</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/r-2.2.9/sl-1.3.4/datatables.min.css" />

    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/r-2.2.9/sl-1.3.4/datatables.min.js"></script>

    @stack('script')
</head>

<body>

    @include('sweetalert::alert')
    @include("dashboard.partials.DashboardNav")

    <div class="container-fluid">
        <div class="row">


            @include("dashboard.partials.DashboardSideNav")
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="/js/dashboard.js"></script>
</body>

</html>
