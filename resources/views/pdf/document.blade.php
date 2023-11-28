<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .rata {
            float: left;
            font-family: Poppins;
        }

        .rata1 {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card" style="background-color: #F0F0F0;">
            <center>
                <img src="{{ asset('template/image/milink-gelap.png') }}" alt="" width="40%" height="30%" style="padding: 22px;">
            </center>
            <div class="row" style="padding: 30px;">
                <div class="row">
                    <div class="col-6">
                        <h6 class="rata" style="color: #088C0D;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                <path d="M14 6.70096C14 10.4018 10.866 13.4019 7 13.4019C3.134 13.4019 0 10.4018 0 6.70096C0 3.00011 3.134 0 7 0C10.866 0 14 3.00011 14 6.70096ZM6.19031 10.2491L11.3839 5.27738C11.5602 5.10856 11.5602 4.83482 11.3839 4.666L10.7452 4.05462C10.5688 3.88577 10.2829 3.88577 10.1065 4.05462L5.87097 8.10919L3.8935 6.21619C3.71714 6.04737 3.43119 6.04737 3.2548 6.21619L2.61614 6.82758C2.43978 6.9964 2.43978 7.27014 2.61614 7.43896L5.55162 10.249C5.728 10.4179 6.01393 10.4179 6.19031 10.2491Z" fill="#088C0D" />
                            </svg>
                            Transaksi Berhasil
                        </h6>
                    </div>
                    <div class="col-6">
                        <h6 class="rata1">Bni</h6>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <h6 class="rata text-muted">Telah Dibayar</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="rata1 text-muted">Rp. </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5 class="rata">Total Bayar</h5>
                    </div>
                    <div class="col-6">
                        <h6 class="rata1">Rp.200</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="rata">Harga</p>
                    </div>
                    <div class="col-6">
                        <p class="rata1">Rp.3000</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="rata">Biaya admin</p>
                    </div>
                    <div class="col-6">
                        <p class="rata1">Rp.100</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <h6 class="rata">Detail Pesanan</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="rata">Nama</p>
                    </div>
                    <div class="col-6">
                        <p class="rata1">wanto</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="rata">Berlangganan</p>
                    </div>
                    <div class="col-6">
                        <p class="rata1">silver</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="rata">Nomor Telepon</p>
                    </div>
                    <div class="col-6">
                        <p class="rata1">08225</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="rata">Referensi</p>
                    </div>
                    <div class="col-6">
                        <p class="rata1">45415256894</p>
                    </div>
                </div>
                <hr>
                <p class="text-muted" style="margin: 0;">PT Hummatech Digital Indonesia</p>
                <p class="text-muted" style="margin: 0;">Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152</p>
            </div>
        </div>
    </div>
</body>

</html>