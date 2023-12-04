@extends('layout.guest.app')
@section('style')
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/link.css') }}" rel="stylesheet" type="text/css">

    <style>
        .spo {
            background-color: #1DB954;
        }

        .spo:hover {
            background-color: #1DB954;
        }

        .tiktok {
            background-color: #010101;
        }

        .tiktok:hover {
            background-color: #010101;
        }

        .tele {
            background-color: #0088cc;
        }

        .tele:hover {
            background-color: #0088cc;
        }

        .link {
            background-color: #1666C5;
        }

        .link:hover {
            background-color: #1666C5;
        }

        .face {
            background-color: #2b4170;
            background: -moz-linear-gradient(top, #3b5998, #2b4170);
            background: -ms-linear-gradient(top, #3b5998, #2b4170);
            background: -webkit-linear-gradient(top, #3b5998, #2b4170);
        }

        .twi {
            background: #55ACEE;
        }

        .twi:hover {
            background: #55ACEE;
        }

        .insta {
            background: #f09433;
            background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            background: -webkit-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f09433', endColorstr='#bc1888', GradientType=1);

        }

        .youtube {
            background: #FF0000;
        }

        .youtube:hover {
            background: #FF0000;
        }

        .olshop {
            background-color: #FF9130;
        }

        .olshop:hover {
            background-color: #FF9130;
        }

        .page-content {
            padding: 13px;
        }

        body {
            overflow: hidden;
        }
    </style>
@endsection
@section('title', $accessMicrosite->name)
<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3" style="margin-top: 5%;">
                <div class="card real-estate-grid-widgets card-animate">
                    <div class="card overflow-hidden">
                        <div>
                            @if ($accessMicrosite->component)
                                <img src="{{ asset('component/' . $accessMicrosite->component->cover_img) }}"
                                    alt="" class="card-img-top profile-wid-img object-fit-cover"
                                    style="height: 200px;">
                            @else
                                <img src="{{ asset('component/' . $accessMicrosite->customtheme->cover_img) }}"
                                    alt="" class="card-img-top profile-wid-img object-fit-cover"
                                    style="height: 200px;">
                            @endif
                        </div>

                        <div class="card-body pt-0 mt-n5">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto">
                                    <img src="{{ asset($accessMicrosite->image ? 'images/' . $accessMicrosite->image : 'images/default.jpg') }}"
                                        alt=""
                                        class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                </div>
                                <div class="mt-3">
                                    <h5>{{ $accessMicrosite->name_microsite }}<i
                                            class="align-baseline text-info ms-1"></i></h5>
                                    <p class="text-muted">{!! $accessMicrosite->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="d-flex flex-wrap justify-content-center text-center mb-4">
                                @foreach ($social as $socialItem)
                                    <div class="mb-2 mx-2">
                                        <a href="{{ $socialItem->button_link }}" target="_blank"
                                            style="text-decoration: none;">
                                            <button type="button"
                                                class="btn btn-icon @if (strtolower(trim($socialItem->button->icon)) === 'bi bi-facebook') face
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-twitter') twi
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-instagram') insta
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-linkedin') link
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-telegram') tele
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-tiktok') tiktok
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-spotify') spo
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-youtube') youtube
                                                @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-bag-fill') olshop
                                                @else notfound @endif">
                                                <i class="{{ $socialItem->button->icon }} " style="color:white;"></i>
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            @foreach ($social as $socialItem)
                                <a href="{{ $socialItem->button_link }}" target="_blank" style="text-decoration: none;">
                                    <button type="button"
                                        class="col-12 mb-2 btn btn-label rounded-pill
                                        d-flex justify-content-center
                                        @if (strtolower(trim($socialItem->button->icon)) === 'bi bi-facebook') face
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-twitter') twi
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-instagram') insta
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-linkedin') link
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-telegram') tele
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-tiktok') tiktok
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-spotify') spo
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-youtube') youtube
                                        @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-bag-fill') olshop
                                        @else notfound @endif"
                                        style="background-color: {{ $socialItem->button->color_hex }}; color: white;"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"
                                            style="color: white;"></i>
                                        <span style="margin-right: 15%">{{ $socialItem->button->name_button }}</span>
                                    </button>
                                </a>
                            @endforeach

                            <div class="card card-body text-center">
                                <h4 type="button" class="card-title" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    {{ $accessMicrosite->company_name }}
                                </h4>
                                <p type="button" class="card-text text-muted" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    {{ $accessMicrosite->company_address }}
                                </p>
                            </div>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div>
        </div>
    </div>
</div>
