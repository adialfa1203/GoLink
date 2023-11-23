@extends('layout.user.app')
@section('title', 'Microsite')

@section('style')
    <style>
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
        margin-left: 10px; /* Atur jarak antara ikon dan teks jika diperlukan */
    }
}

/* Sembunyikan teks di perangkat seluler */
@media (max-width: 575px) {
    .square-button .btn-text {
        display: none;
    }
        /* Tampilkan teks hanya di perangkat selain seluler */
        .square-button {
    width: 40px; /* Ubah lebar sesuai kebutuhan Anda */
    height: 40px; /* Ubah tinggi sesuai kebutuhan Anda */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center; /* Tambahkan ini */
}
}




</style>
@endsection

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-9">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Microsite</h4>
                    </div>
                </div>
            </div>

            <!-- end page title -->

            <div class="card mt-1">
                <div class="card-body">
                    <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-2 col-2 mb-2">
    <a href="{{ route('add.microsite') }}" type="button" class="btn btn-success btn-label square-button">
        <i class="ri-add-line label-icon align-middle fs-lg"></i>
        <span class="btn-text">Buat Baru</span>
    </a>
</div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 mb-2">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn rounded-pill btn-danger" id="semuaButton">Semua</button>
                                <button type="button" class="btn rounded-pill btn-secondary" onclick="filterTerakhirDiperbarui()">Terakhir Diperbarui</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!--end card-->
            @php
            $i = 0;
            @endphp
            <div id="microsite-container">
                @foreach ($data as $row)
                @php
                $i++;
                @endphp
                <div class="">
                    <div class="card card-body" id="searchResults">
                        <div class="wrapper row  align-items-center">
                            <div class="avatar-md col-xl-1 col-lg-1 col-md-1 col-sm-1 col-12">
                                <div class="avatar-title">
                                    <img src="{{ asset('template/themesbrand.com/steex/layouts/assets/images/sidebar/img-1.jpg') }}" style="width: 180%; height: 70%;" alt="Gambar">
                                    <!-- <div class="initials">{{ $row->name[0] }}</div> -->
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-9 col-sm-3 col-9">
                                    <h5 class="card-title ">{{ $row->name }}</h5>
                                    <a>
                                        <h3 class="garisbawah card-title mb-2">
                                            {{ $short_urls->where('microsite_uuid', $row->id)->first()->default_short_url }}
                                        </h3>
                                    </a>
                                <div id="customAlert" class="custom-alert">
                                    <span class="alert-text"></span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-8 col-sm-6 col-12" style="float: right ;">
                                        <div class="" style="float: right;">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample{{ $row->id }}" role="button" aria-expanded="true" aria-controls="collapseExample{{ $row->id }}">
                                                <i class="bi bi-bar-chart-fill"></i> statistik
                                            </button>
                                            {{-- @dd($row) --}}
                                            <a href="{{ route('edit.microsite', ['id' => $row->id]) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>
                                                Edit</a>
                                            <button type="button" id="button-email" class="btn btn-primary me-3 btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#bagikan{{ $i }}"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="fa-solid fa-share-nodes"></i>
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
                                                                        onclick="window.open(`https://www.facebook.com/sharer/sharer.php?u=${document.getElementById('link_microsite{{ $i }}').innerText}`)"><i
                                                                            class="bi bi-facebook"></i> &nbsp;
                                                                        Facebook</label>
                                                                </div>
                                                                <div class="countdown-input-subscribe">
                                                                    <label class="platform"
                                                                        onclick="window.open(`https://twitter.com/intent/tweet?url=${document.getElementById('link_microsite{{ $i }}').innerText}`)"><i
                                                                            class="bi bi-twitter"></i> &nbsp;
                                                                        Twitter</label>
                                                                </div>
                                                                <div class="countdown-input-subscribe">
                                                                    <label class="platform"
                                                                        onclick="window.open(`https://api.whatsapp.com/send?text=${document.getElementById('link_microsite{{ $i }}').innerText}`)"><i
                                                                            class="bi bi-whatsapp"></i> &nbsp;
                                                                        WhatsApp</label>
                                                                </div>
                                                                {{-- @dd($short_urls->destination_url) --}}
                                                                {{-- @dd( $row->shortUrl->destination_url) --}}
                                                                <div class="countdown-input-subscribe">
                                                                    <label class="platform" data-platform="copy"
                                                                        @if ($row->short_url) data-url="{{ $row->shortUrl->destination_url }}"
                                                                        data-id-microsite="{{ $row->shortUrl->id }}"
                                                                        @else
                                                                        data-url=""
                                                                        data-id-microsite="" @endif
                                                                        data-id-alert="{{ $i }}">
                                                                        <i class="bi bi-clipboard-fill"></i>
                                                                        &nbsp;
                                                                        Copy
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end Modal bagikan-->
                                        </div>
                                    </div>
                                </div>
                                <p class="d-none" id="link_microsite{{ $i }}">{{ $row->link_microsite }}</p>
                                <div class="collapse" id="collapseExample{{ $row->id }}">
                                    <div class="card-footer">
                                        <div class="d-flex">
                                            <div class="col-10">
                                                <h5><i class="bi bi-bar-chart-line-fill"></i> statistik</h5>
                                            </div>
                                            <div class="col-2 d-flex flex-row justify-content-end">
                                                <button type="button" class="btn btn-light "><span>Lihat
                                                        Detail</span>&nbsp;<i class="fa-solid fa-arrow-right"></i></button>
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
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

    @php
        use Carbon\Carbon;
    @endphp
    @section('script')
        @foreach ($data as $row)
            <script>
                var options = {
                    series: [{
                        name: "{{ $row->title }}",
                        data: ["{{ $row->visits_count }}"],
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
                        text: 'Product Trends by Month',
                        align: 'left'
                    },
                    grid: {
                        row: {
                            colors: ['#f3f3f3', 'transparent'],
                            opacity: 0.5
                        },
                    },
                    xaxis: {
                        categories: ["{{ Carbon::create(null, $row->month, null)->format('F') }}"],
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart{{ $row->id }}"), options);
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
                        window.open("https://api.whatsapp.com/send?text=" + encodeURIComponent(shortUrl));
                        break;
                        // case "copy":
                        //     var copyText = $(this).data('url')
                    //     
                        //     try {
                        //         navigator.clipboard.writeText(copyText);
                    //         
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
                var platformElement = document.querySelector(".platform[data-id-alert='" + id + "']");
                var linkMicrosite = platformElement ? platformElement.getAttribute("data-url") : null;                
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
                        data: {
                            button_id: buttonId
                        },
                        success: function(response) {                            
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