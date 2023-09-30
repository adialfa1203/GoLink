<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error 403 Forbidden </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">403</h1>
            <p class="fs-3"> <span class="text-danger">Maaf, Anda tidak memiliki izin untuk mengakses halaman
                    ini.</span></p>
            <p class="lead">
                Server mengirim kode status HTTP 403 "Terlarang" saat server menolak akses ke sumber daya yang diminta
                oleh klien karena alasan tertentu.
            </p>
            @auth
                @if (auth()->user()->hasRole('admin'))
                    <a class="btn btn-primary text-white" href="{{ route('dashboard.admin') }}">Kembali</a>
                @elseif(auth()->user()->hasRole('user'))
                    <a class="btn btn-primary text-white" href="{{ route('dashboard.user') }}">Kembali</a>
                @else
                    <a class="btn btn-primary text-white" href="{{ route('login') }}">Kembali ke Login</a>
                @endif
            @endauth
        </div>
    </div>
</body>


</html>
