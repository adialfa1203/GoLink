<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 Error Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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
    <style>
        .custom-button {
            background-color: #0E2954;
            color: #fff;
            padding: 8px 30px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center center-content">
            <img src="https://i.postimg.cc/263Nqz39/404-Error-pana.png" alt="Gambar 404" />
            <b class="fs-3"> <span class="text-danger">Tidak Ditemukan!</span></b>
            <br>
            <p class="font-weight-bold fs-5" style="color: #0E2954; font-family: Poppins">
                Tautan yang anda kunjungi tidak ada atau telah kadaluarsa
            </p>
            @auth
                @if (auth()->user()->hasRole('admin'))
                    <a class="btn custom-button text-white" href="{{ route('dashboard.admin') }}">Kembali</a>
                @elseif(auth()->user()->hasRole('user'))
                    <a class="btn custom-button text-white" href="{{ route('dashboard.user') }}">Kembali</a>
                @else
                    <a class="btn custom-button text-white" href="{{ route('login') }}">Kembali ke Login</a>
                @endif
            @else
                <a class="btn custom-button text-white" href="{{ route('login') }}">Kembali ke Login</a>
            @endauth            
        </div>
    </div>
</body>

</html>
