@extends('layout.user.app')
@section('title', 'Microsite')

@section('style')
    <style>
          .page-content{
            overflow-x: hidden;
          }
        .custom-alert {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #f1f1f1;
            color: #333;
            border-radius: 5px;
            border: 1px solid #ccc;
            z-index: 1000;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            animation: fade-in 0.3s ease-in-out;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .alert-text {
            display: block;
            text-align: center;
        }

        .alert-success {
            font-family: 'Poppins';
            background-color: #2DCB73;
            color: #ffffff;
            border-color: #2DCB73;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .initials {
            position: absolute;
            top: 13px;
            /* Sesuaikan dengan posisi vertikal yang diinginkan */
            left: 20px;
            /* Sesuaikan dengan posisi horizontal yang diinginkan */
            /* background-color: #19383d; Warna latar belakang */
            color: #fff;
            /* Warna teks */
            font-size: 24px;
            /* Ukuran huruf */
            padding: 5px 10px;
            /* Padding untuk ruang di sekitar huruf */
            border-radius: 50%;
            /* Membuat huruf menjadi lingkaran */
        }


        /* Tampilkan teks hanya di perangkat selain seluler */
        @media (min-width: 576px) {
            .square-button .btn-text {
                display: inline-block;
                margin-left: 10px;
                /* Atur jarak antara ikon dan teks jika diperlukan */
            }
        }

        /* Sembunyikan teks di perangkat seluler */
        @media (max-width: 575px) {
            .square-button .btn-text {
                display: none;
            }

            /* Tampilkan teks hanya di perangkat selain seluler */
            .square-button {
                width: 20px;
                /* Ubah lebar sesuai kebutuhan Anda */
                height: 40px;
                /* Ubah tinggi sesuai kebutuhan Anda */
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                /* Tambahkan ini */
            }
            .button{
                width: 70px;
                height: 40px;
                font-size: 10px;
            }
            .btn-subtle-primary{
                width: 122px;
                height: 40px;
                font-size: 10px;

            }
        }
    </style>
    <style>
        /* Gaya CSS untuk tampilan hp */
        @media (max-width: 576px) {
            .search-box {
                width: 100%; /* Lebar 100% untuk tampilan hp */
                margin-top: 10px; /* Spasi atas untuk tampilan hp */
            }
        }

    </style>
    <style>
        .page-content{
            background: #ffffff !important;
        }
    </style>
@endsection

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="d-flex flex-column flex-sm-row">
                <div class="col-12 col-sm-4">
                {{-- <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Microsite</h4>
                    </div> --}}
                </div>
                <div class="col-12 col-sm-8 mb-3">
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-sm-end">
                        <div class="search-box mb-2 mb-sm-0">
                            <input type="text" class="form-control search" placeholder="Cari...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 mb-2">
                    <button type="button" class="btn btn-subtle-primary active-hover" style="background-color: #104898; color:#fff;" id="semuaButton">Semua</button>
                    <button type="button" class="btn btn-subtle-primary" style="background-color: #2F5EA2; color:#fff;" id="showAdditionalData"
                    onclick="filterTerakhirDiperbarui()">Terakhir Diperbarui</button>
               </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 col-2 mb-2">
                    <div class="hstack gap-2 justify-content-end">
                        <a href="{{ route('add.microsite') }}" type="button"
                            class="btn btn-label square-button" style="background-color: #088C0D">
                            <i class="ri-add-line label-icon align-middle fs-lg icon-color" style="color: white;"></i>
                            <span class="btn-text square-button" style="color: #ffffff;">Buat Microsite</span>
                        </a>
                    </div>
                </div>
            </div><br>
            @php
                $i = 0;
            @endphp
            <div id="microsite-container">
                @if ($d->isEmpty())
                    <div class="card d-flex flex-column align-items-center">
                        <img style="width: 300px; height: 300px;" src="{{ asset('images/Empty.png') }}" alt="Gambar">
                        <div class="d-flex justify-content-center align-items-center mt-2 mb-4">
                            <i class="ph-magnifying-glass fs-2 text-primary"></i>
                            <h5 class="mt-2">Maaf! Belum Ada Data Yang Ditemukan</h5>
                        </div>
                    </div>
                @else
                    @foreach ($d as $row)
                        @if ($row->user_id == $user_id)
                            @php
                                $i++;
                            @endphp
                            <div class="">
                                <div class="card card-body" style="background-color: #F0F0F0; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);" id="searchResults">
                                    <div class="wrapper row  align-items-center">
                                        <div class="avatar-md col-xl-1 col-lg-1 col-md-1 col-sm-1 col-12">
                                            <div class="avatar-title">
                                                <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/sidebar/img-1.png') }}"
                                                    style="width: 180%; height: 70%;" alt="Gambar">
                                            </div>
                                            <div class="initials">{{ $row->name[0] }}</div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-9 col-sm-3 col-9">
                                            <h4 class="card-title " style="color: #0E2954;">{{ $row->name }}</h4>
                                            {{-- <a>
                                                <h3 class="garisbawah card-title mb-2">
                                                    {{ $row->shortUrl[0]->default_short_url }}
                                                </h3>
                                            </a> --}}
                                            <a href="{{ $row->shortUrl[0]->default_short_url }}" target="_blank"
                                                class="garisbawah card-title mb-2">
                                                <h5 style="color: #0E2954;">{{ $row->shortUrl[0]->default_short_url }}</h5>
                                            </a>
                                            <div id="customAlert" class="custom-alert">
                                                <span class="alert-text"></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-8 col-sm-6 col-12" style="float: right ;">
                                            <div class="" style="float: right;">
                                                <button type="button" class="btn btn-sm" style="background-color: #0E2954; color:#fff;" data-bs-toggle="collapse"
                                                    href="#collapseExample{{ $row->id }}" role="button" aria-expanded="true"
                                                    aria-controls="collapseExample{{ $row->id }}">
                                                    <i class="bi bi-bar-chart-fill icon-color"></i> statistik
                                                </button>
                                                {{-- @dd($row) --}}
                                                <a href="{{ route('edit.microsite', ['id' => $row->id]) }}"
                                                    class="btn btn-sm" style="background-color: #0E2954; color:#fff;"><i class="bi bi-pencil-square icon-color"></i>
                                                    Edit</a>
                                                <button type="button" id="button-email" class="btn me-3 btn-sm" style="background-color: #0E2954; color:#fff;"
                                                    data-bs-toggle="modal" data-bs-target="#bagikan{{ $i }}"
                                                    aria-haspopup="true" aria-expanded="false"><i
                                                        class="fa-solid fa-share-nodes icon-color"></i>
                                                    &nbsp;Bagikan</button>
                                                <!-- Modal bagikan -->
                                                <div class="modal fade" id="bagikan{{ $i }}" tabindex="-1"
                                                    aria-labelledby="addAmountLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="row g-3">
                                                                    <div class="countdown-input-subscribe">
                                                                        <label class="platform"
                                                                            onclick="window.open(`https://www.facebook.com/sharer/sharer.php?u={{ $row->oneShortUrl->default_short_url }}`)"><i
                                                                                class="bi bi-facebook"></i> &nbsp;
                                                                            Facebook</label>
                                                                    </div>
                                                                    <div class="countdown-input-subscribe">
                                                                        <label class="platform"
                                                                            onclick="window.open(`https://twitter.com/intent/tweet?url={{ $row->oneShortUrl->default_short_url }}`)"><i
                                                                                class="bi bi-twitter"></i> &nbsp;
                                                                            Twitter</label>
                                                                    </div>
                                                                    <div class="countdown-input-subscribe">
                                                                        <label class="platform"
                                                                            onclick="window.open(`https://api.whatsapp.com/send?text={{ $row->oneShortUrl->default_short_url }}`)"><i
                                                                                class="bi bi-whatsapp"></i> &nbsp;
                                                                            WhatsApp</label>
                                                                    </div>
                                                                    {{-- @dd($short_urls->destination_url) --}}
                                                                    {{-- @dd( $row->shortUrl->destination_url) --}}
                                                                    <div class="countdown-input-subscribe">
                                                                        <label class="platform" data-platform="copy"
                                                                            @if ($row->oneShortUrl) data-url="{{ $row->oneShortUrl->default_short_url }}"
                                                                            data-id-microsite="{{ $row->oneShortUrl->id }}"
                                                                            @else
                                                                            data-url="" data-id-microsite="" @endif
                                                                            data-id-alert="{{ $i }}">
                                                                            <i class="bi bi-clipboard-fill"></i>
                                                                            &nbsp;
                                                                            Copy
                                                                        </label>
                                                                    </div>
                                                                    <div class="countdown-input-subscribe">
                                                                        <a id="tombol-modal"
                                                                            onclick="tombolmodal('{{ $row->id }}')"
                                                                            type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#tombol-modal-{{ $row->id }}"
                                                                            data-id="{{ $row->id }}"><i
                                                                                class="bi bi-qr-code"></i> &nbsp; QR
                                                                            Code</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div id="tombol-modal-{{ $row->id }}"
                                                    class="modal fade zoomIn modal-sm" tabindex="-1"
                                                    aria-labelledby="zoomInModalLabel" aria-hidden="true"
                                                    style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="zoomInModalLabel">Gambar Kode
                                                                    QR
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @if ($row->shortUrl[0]->default_short_url)
                                                                    <div class="visible-print text-center">
                                                                        {!! QrCode::size(200)->generate($row->shortUrl[0]->default_short_url) !!}
                                                                    </div>
                                                                @else
                                                                    <p>Tidak ada URL yang tersedia untuk membuat kode QR.
                                                                    </p>
                                                                @endif
                                                                <br>
                                                                <div class="text-center">
                                                                    <p> {{ $row->shortUrl[0]->default_short_url }}</p>
                                                                </div>
                                                            </div>
                                                            {{-- <center>
                                        <button type="button" class="btn btn-danger">Download</button>
                                        <button type="button" class="btn btn-light  me-3"><span><i
                                                    class="fa-solid fa-pen-to-square"></i>&nbsp;Ganti</span></button>
                                    </center> --}}
                                                            <div class="modal-footer"></div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                                <!-- end Modal bagikan-->
                                            </div>
                                        </div>
                                    </div>
                                    <p class="d-none" id="link_microsite{{ $i }}">{{ $row->link_microsite }}
                                    </p>

                                    <div class="collapse" id="collapseExample{{ $row->id }}">
                                        <div class="card-footer">
                                            <div class="d-flex">
                                                <div class="col-10">
                                                    <h5><i class="bi bi-bar-chart-line-fill"></i> statistik</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="chart{{ $row->id }}"></div>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div>

                                </div>
                            </div><!-- end col -->
                        @endif
                    @endforeach
                @endif
                <div class="pagination-wrap hstack justify-content-center gap-2 mb-3">
                    <a class="page-item pagination-prev {{ $d->previousPageUrl() ? '' : 'disabled' }}"
                        href="{{ $d->previousPageUrl() ? $d->previousPageUrl() : '#' }}">
                        Sebelumnya
                    </a>
                    <ul class="pagination listjs-pagination mb-0">
                        @if ($d->currentPage() > 2)
                            <li>
                                <a class="page" href="{{ $d->url(1) }}">1</a>
                            </li>
                            @if ($d->currentPage() > 3)
                                <li class="ellipsis">
                                    <span>...</span>
                                </li>
                            @endif
                        @endif

                        @for ($i = max(1, $d->currentPage() - 1); $i <= min($d->lastPage(), $d->currentPage() + 1); $i++)
                            <li class="{{ $i == $d->currentPage() ? 'active' : '' }}">
                                <a class="page" href="{{ $d->url($i) }}"
                                    data-i="{{ $i }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($d->currentPage() < $d->lastPage() - 1)
                            @if ($d->currentPage() < $d->lastPage() - 2)
                                <li class="ellipsis">
                                    <span>...</span>
                                </li>
                            @endif
                            <li>
                                <a class="page"
                                    href="{{ $d->url($d->lastPage()) }}">{{ $d->lastPage() }}</a>
                            </li>
                        @endif
                    </ul>
                    <a class="page-item pagination-next {{ $d->nextPageUrl() ? '' : 'disabled' }}"
                        href="{{ $d->nextPageUrl() ? $d->nextPageUrl() : '#' }}">
                        Selanjutnya
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    use Carbon\Carbon;
@endphp
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @foreach ($urlshort as $i => $row)
        <script>
            var options = {
                series: [{
                    name: "jumlah data",
                    data: <?= json_encode($result['series'][$i]) ?>,
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Data Perbulan',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: <?= json_encode($result['labels']) ?>,
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart{{ $row->microsite_uuid }}"), options);
            chart.render();
        </script>
    @endforeach
    <script src="{{ asset('template/themesbrand.com/steex/layouts/assets/js/pages/form-wizard.init.js') }}"></script>
    <script type="text/javascript" src="./jquery.qrcode.js"></script>
    <script type="text/javascript" src="./qrcode.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // $("#copyButton").click(function() {
            //     let id = $(this).data('id-copy');
            //     let data = $("#link_microsite" + id);

            //     data.select();
            //     data.setSelectionRange(0, 99999);
            //     navigator.clipboard.writeText(data.value);

            // })
            $("#resetButton").click(function() {
                $(".password-input").val("");
            });
            $("#time-reset").click(function() {
                $(".time-input").val("");
            });

            $('.btn-qr').click(function() {

                alert($(this).data('link'))
                $(".demo").qrcode({
                    mode: 1,
                    label: 'jQueryScript.Net',
                    fontname: 'sans',
                    fontcolor: '#000'

                });
                $('#zoomInModal2').modal({
                    show: true
                })
            })
        });
        $("#button-email").click(function() {
            var linkToCopy = $("#link-to-copy").text();

            $("#link_microsite").val(linkToCopy);

            // $("#copyButton").attr("data-clipboard-text", linkToCopy);
        });

        // $("body").on("click", ".platform[data-platform='copy']", function() {
        //     var linkToCopy = $(this).data("url");
        //     var idMicrosite = $(this).data("id-copy");

        //     var tempInput = $("<input>");
        //     $("body").append(tempInput);
        //     tempInput.val(linkToCopy).select();
        //     document.execCommand("copy");
        //     tempInput.remove();

        //     var successAlert = $("#successCopyAlert" + idMicrosite);
        //     successAlert.fadeIn().delay(1500).fadeOut();
        // });

        $(".platform").click(function() {
            var platform = $(this).data("platform");
            var shortUrl = $("#link_microsite").text();

            switch (platform) {
                case "facebook":
                    window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(shortUrl));
                    break;
                case "twitter":
                    window.open("https://twitter.com/intent/tweet?url=" + encodeURIComponent(shortUrl));
                    break;
                case "whatsapp":
                    console.log(shortUrl)
                    window.open("https://api.whatsapp.com/send?text=" + encodeURIComponent(shortUrl));
                    break;
                    // case "copy":
                    //     var copyText = $(this).data('url')
                    //     console.log()
                    //     try {
                    //         navigator.clipboard.writeText(copyText);
                    //         console.log('Content copied to clipboard');
                    //     } catch (err) {
                    //         console.error('Failed to copy: ', err);
                    //         alert('gagal ' + err)
                    //     }
                    //     break;

                case "qr":
                    window.open(
                        " https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${document.getElementById('link_microsite{{ $i }}').innerText}" +
                        encodeURIComponent(shortUrl));
                    break;
                default:
                    break;
            }
        });
    </script>
    <script>
        function copyToClipboard(text) {
            if (!navigator.clipboard) {
                // Fallback untuk browser yang tidak mendukung Clipboard API
                var dummy = document.createElement("textarea");
                document.body.appendChild(dummy);
                dummy.value = text;
                dummy.select();
                document.execCommand("copy");
                document.body.removeChild(dummy);
            } else {
                navigator.clipboard.writeText(text)
                    .then(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Link berhasil disalin!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tidak dapat menyalin link.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
            }
        }

        function copyLinkMicrosite(id) {
            console.log('Copying link for ID: ' + id);
            var platformElement = document.querySelector(".platform[data-id-alert='" + id + "']");
            var linkMicrosite = platformElement ? platformElement.getAttribute("data-url") : null;
            console.log('Link Microsite: ' + linkMicrosite);
            if (linkMicrosite) {
                copyToClipboard(linkMicrosite);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak ada Link Microsite yang tersedia.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }

        document.querySelectorAll('.platform').forEach(function(element) {
            element.addEventListener('click', function() {
                var dataIdAlert = this.getAttribute('data-id-alert');
                copyLinkMicrosite(dataIdAlert);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("button.btn").click(function() {
                var buttonId = $(this).attr("id");
                $.ajax({
                    type: "POST",
                    url: "{{ route('create.microsite') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        button_id: buttonId
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".btn").click(function() {
                var buttonValue = $(this).attr("data-button-value");

                var checkbox = $("input[type='checkbox'][value='" + buttonValue + "']");

                if (checkbox.is(":checked")) {
                    checkbox.prop("checked", false);
                } else {
                    checkbox.prop("checked", true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".btn").click(function() {
                var buttonValue = $(this).attr("data-button-value");

                var checkbox = $("input[type='checkbox'][value='" + buttonValue + "']");

                if (checkbox.is(":checked")) {
                    checkbox.prop("checked", false);
                } else {
                    checkbox.prop("checked", true);
                }
            });
        });
    </script>
    <script>
        function toggleCardHover(cardId) {
            const card = document.getElementById(cardId);
            card.classList.toggle('hover');
        }
    </script>
    <script>
        function validateForm() {
            var activeTab = $('.tab-pane.active');
            var inputs = activeTab.find(
                'input[type="text"], input[type="radio"], input[type="checkbox"], select'
            );
        }
    </script>

    <script>
        function toggleCardHover(cardId) {
            const card = document.getElementById(cardId);
            card.classList.toggle('hover');
        }
    </script>

    <script>
        function validateForm() {
            var activeTab = $('.tab-pane.active');
            var inputs = activeTab.find(
                'input[type="text"], input[type="radio"], input[type="checkbox"], select'
            );

            var invalidInputs = inputs.filter(function() {
                if ($(this).attr('type') == 'radio') {
                    var groupName = $(this).attr('name');
                    return $('input[name="' + groupName + '"]:checked').length === 0;
                }

                if ($(this).attr('type') == 'checkbox') {
                    return !$(this).is(':checked');
                }

                if ($(this).is('select')) {
                    return $(this).val() === null;
                }

                return $.trim($(this).val()) === '';
            });

            if (invalidInputs.length > 0) {
                alert('Silakan isi semua data yang diperlukan sebelum melanjutkan.');
                $('.nav-link:first').tab('show');
                return false;
            }

            return true;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.search').keyup(function() {
                var searchText = $(this).val().toLowerCase();
                $('.card').each(function() {
                    var cardText = $(this).text().toLowerCase();
                    if (cardText.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>

    <script>
        function filterTerakhirDiperbarui() {
            window.location.href = "{{ route('microsite') }}?filter=terakhir_diperbarui";
        }

        document.getElementById('semuaButton').addEventListener('click', function() {
            window.location.href = "{{ route('microsite') }}";
        });
    </script>


@endsection
