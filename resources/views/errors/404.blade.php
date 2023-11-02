<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 Error Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .center-content {
            text-align: center;
        }
        .center-content img {
            max-width: 100%;
            max-height: 300px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center center-content">
            <img src="https://i.postimg.cc/DZxQM6wM/404.png" alt="Gambar 404" />
            <b class="fs-3"> <span class="text-danger">Tidak Ditemukan!</span></b>
            <br>
            <p class="font-weight-bold fs-3" style="color: #0E2954">
                Tautan yang anda akses telah ubah atau kadaluarsa.
            </p>
            @auth
                @if (auth()->user()->hasRole('admin'))
                    <a class="btn btn-primary text-white" href="{{ route('dashboard.admin') }}">Kembali</a>
                @elseif(auth()->user()->hasRole('user'))
                    <a class="btn btn-primary text-white" href="{{ route('dashboard.user') }}">Kembali</a>
                @else
                    <a class="btn btn-primary text-white" href="{{ route('login') }}">Kembali ke Login</a>
                @endif
            @else
                <a class="btn btn-primary text-white" href="{{ route('login') }}">Kembali ke Login</a>
            @endauth            
        </div>
    </div>
</body>

</html>