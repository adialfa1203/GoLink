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
            overflow-x:hidden;
        }
    </style>
@endsection
@section('title', $accessMicrosite->name)
<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3">
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
                                    <h5 class="mb-2"><strong>{{ $accessMicrosite->name_microsite }}<i
                                            class="align-baseline text-info ms-1"></i></strong></h5>
                                    <p class="text-muted">{!! $accessMicrosite->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            @foreach ($social as $socialItem)
                            @if (strtolower(trim($socialItem->button->icon)) === 'bi bi-facebook')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill face" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-twitter')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill twi" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-instagram')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill insta" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-linkedin')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill link" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-telegram')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill tele" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-tiktok')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill tiktok" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-spotify')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill spo" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-youtube')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill youtube" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @elseif (strtolower(trim($socialItem->button->icon)) === 'bi bi-bag-fill')
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color: white;" type="button" class="col-xl-12 col-12 btn mt-2 btn-label rounded-pill olshop" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id }}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}" onclick="toggleCardHover('{{ $socialItem->button->id }}')">
                                <i class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                  <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @else
                            <a href="{{ $socialItem->button_link }}" target="_blank">
                            <button style="color:#fff;background-color: {{ $socialItem->button->color_hex }}; width: 100%;" type="button" class="col-xl-012 col-12 mt-2 btn btn-label rounded-pill" data-bs-toggle="collapse" data-bs-target="{{ $socialItem->button->id}}" aria-expanded="true" aria-controls="{{ $socialItem->button->id }}">
                                <i class="bi bi-link-45deg label-icon align-middle rounded-pill fs-lg me-2" style="color: white;"></i>
                                <p style="margin: 0; margin-left:-14%;">{{ $socialItem->button->name_button }}</p>
                            </button>
                            </a>
                            @endif
                            @endforeach
                            <div class="card card-body text-center">
                                <h4 type="button" class="card-title" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    {{ isset($accessMicrosite->company_name) ? $accessMicrosite->company_name : '' }}
                                </h4>
                                <p type="button" class="card-text text-black" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    {{ isset($accessMicrosite->company_address) ? $accessMicrosite->company_address : '' }}
                                </p>
                            </div>
                        </div>
                    </div><!--end card-->
                </div><!--end col-->
            </div>
        </div>
    </div>
</div>
