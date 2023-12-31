<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .rata {
            text-align: left;
            margin-top: 0;
            font-family: sans-serif;
            font-weight: lighter;
        }

        .rata1 {
            text-align: right;
            margin-top: 0;
            font-family: sans-serif;
            font-weight: lighter;
        }
        .ri-checkbox-circle-fill {
  /* Gaya ikon checkbox */
  display: inline-block;
  width: 16px; /* Sesuaikan lebar ikon sesuai kebutuhan */
  height: 16px; /* Sesuaikan tinggi ikon sesuai kebutuhan */
  background-color: #28a745; /* Warna hijau sesuai dengan kelas "text-success" */
  border-radius: 50%; /* Membuat sudut border menjadi lingkaran */

  /* Gaya centang di dalam lingkaran */
  position: relative;
  &:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 8px; /* Sesuaikan lebar centang sesuai kebutuhan */
    height: 3px; /* Sesuaikan tinggi centang sesuai kebutuhan */
    border: 2px solid #fff; /* Warna putih untuk centang */
    border-top: none;
    border-left: none;
    transform: rotate(-45deg); /* Rotasi centang */
  }
}

    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card" style="background-color: #F0F0F0;padding: 30px; ">
        <center>
            <img src="template/image/milink-gelap.png" alt="logo" width="200" height="50" style="margin-bottom: 20px;">
        </center>
            <table class="table" style=" width: 100%;">
                <tr>
                    <td style="width: 50%;">
                        <h5 class="rata" style="color: #088C0D;margin-bottom: 0;font-weight: bold;">
                            <img src="template/image/icon.png" alt="" srcset="">
                            Transaksi Berhasil
                        </h5>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <h5 class="rata1" style="font-weight:bold; margin-bottom: 0;"> {{ $detailTransaction->data->payment_method }}</h5>
                    </td>
                </tr>
            </table>
            <hr>
            <table class="table" style=" width: 100%;">
                <tr>
                    <td style="width: 50%;">
                        <h5 class="rata" style="color: #888888;">Telah Dibayar</h5>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <h5 class="rata1" style="color: #888888;">{{ \Carbon\Carbon::parse($transaction->updated_at)->isoFormat('D MMMM YYYY HH:mm:ss') }}</h5>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <h5 class="rata" style="font-weight: bold;">Total Bayar</h5>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <h5 class="rata1" style="font-weight: bold;margin-bottom: 0;">Rp.{{ number_format($detailTransaction->data->amount, 2, ',', '.') }}</h5>
                    </td>
                </tr>
            </table>
            <hr>
            <table class="table" style=" width: 100%;">
                <tr>
                    <td>
                        <h5 style="margin-top: 0;font-family: sans-serif;font-weight: bold;">Detail Pesanan</h5>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <h5 class="rata">Nama</h5>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <h5 class="rata1">{{ $detailTransaction->data->customer_name }}</h5>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <h5 class="rata">Berlangganan</h5>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <h5 class="rata1">{{ $detailTransaction->data->order_items[0]->name }}</h5>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <h5 class="rata">Nomor Telepon </h5>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <h5 class="rata1">{{ $detailTransaction->data->customer_phone }}</h5>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">
                        <h5 class="rata" style="margin-bottom: 0">Referensi</h5>
                    </td>
                    <td style="text-align: right; padding-right: 20px;">
                        <h5 class="rata1" style="margin-bottom: 0">{{ $detailTransaction->data->reference }}</h5>
                    </td>
                </tr>
            </table>
            <hr>
            <h5 style="margin: 0;font-family: sans-serif;font-weight: lighter; color: #888888;">PT Hummatech Digital Indonesia</h5>
        </div>
    </div>
</body>

</html>
