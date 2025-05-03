<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบจัดการพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">ระบบจัดการพนักงาน</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="nav-link" href="{{ route('departments.index') }}">แผนก</a>
                    <a class="nav-link" href="{{ route('employees.index') }}">พนักงาน</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
