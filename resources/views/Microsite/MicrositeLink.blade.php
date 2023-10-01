@extends('layout.guest.app')
@section('title', $accessMicrosite->name)
@section('style')
    <link href="{{ asset('template/themesbrand.com/steex/layouts/assets/css/link.css') }}" rel="stylesheet" type="text/css">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-3">
                    <div class="card real-estate-grid-widgets card-animate">
                        <div class="card overflow-hidden">
                            <div>
                                <img src="{{ asset('component/' . $accessMicrosite->component->cover_img) }}" alt=""
                                    class="card-img-top profile-wid-img object-fit-cover" style="height: 200px;">
                            </div>
                            <div class="card-body pt-0 mt-n5">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto">
                                        <img src="{{ asset($accessMicrosite->image ? 'images/' . $accessMicrosite->image : 'images/default.jpg') }}"
                                            alt=""
                                            class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
                                    </div>
                                    <div class="mt-3">
                                        <h5>{{ $accessMicrosite->name_microsite }}<i class="align-baseline text-info ms-1"></i>
                                        </h5>
                                        <p class="text-muted">{!! $accessMicrosite->description !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="d-flex flex-wrap justify-content-center text-center mb-4">
                                    @foreach ($social as $socialItem)
                                        <div class="mb-2 mx-2">
                                            <a href="{{ $socialItem->button_link }}" target="_blank" style="text-decoration: none;">
                                            <button style="background-color: {{ $socialItem->button->color_hex }};"
                                                type="button" class="btn btn-icon"><i
                                                    class="{{ $socialItem->button->icon }} " style="color:white;"></i>
                                            </button>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                @foreach ($social as $socialItem)
                                    <a href="{{ $socialItem->button_link }}" target="_blank" style="text-decoration: none;">
                                        <button type="button"
                                            class="col-12 mb-2 btn btn-label rounded-pill d-flex justify-content-center"
                                            style="background-color: {{ $socialItem->button->color_hex }}; color: white;">
                                            <i
                                                class="{{ $socialItem->button->icon }} label-icon align-middle rounded-pill fs-lg me-2"></i>
                                            <span style="margin-right: 15%">{{ $socialItem->button->name_button }}</span>
                                        </button>
                                    </a>
                                @endforeach
                                <div class="card card-body text-center">
                                    <h4 type="button" class="card-title" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        {{ $accessMicrosite->company_name }}</h4>
                                    <p type="button" class="card-text text-muted" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        {{ $accessMicrosite->company_address }} </p>
                                </div>
                            </div>

                        </div><!--end card-->
                    </div><!--end col-->
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="__next">
    <section class="MicrositeContainer_Main_h7wfn MicrositeContainer_Main_isNotBuilderR1vOP MicrositeContainer_ButtonSizeLg_WNJnp" style="background-color:rgb(209 213 219 / 1);--dark-color:#000;--light-color:#fff;--text-color:#111827;--link-color:255, 255, 255;--link-background:118, 124, 131;--link-shadow:#fff;--link-border:#fff;--divider-color:255, 255, 255">
        <div class="fixed top-0 left-0 w-full h-full overflow-hidden">
            <div class="bg-center bg-repeat absolute -left-10 -right-10 -bottom-10 -top-10 blur-xl bg-cover" style="background-image:url(../cdn.s.id/images/8cc9c75d-641e-4947-ad9f-42f31e408caf_1000x1500.webp.jpeg)">
            </div>
        </div>
        <style>
            body,
            html {
                overscroll-behavior-y: none;
            }
        </style>
        <div class="fixed top-3 right-3 z-50"><button class="transition-all bg-white bg-opacity-80 rounded-full p-3 hover:bg-opacity-100"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 text-gray-900">
                    <path fill-rule="evenodd" d="M15.75 4.5a3 3 0 11.825 2.066l-8.421 4.679a3.002 3.002 0 010 1.51l8.421 4.679a3 3 0 11-.729 1.31l-8.421-4.678a3 3 0 110-4.132l8.421-4.679a3 3 0 01-.096-.755z" clip-rule="evenodd"></path>
                </svg></button></div>
        <div class="fixed top-0 left-0 right-0 bottom-0 h-full flex">
            <div class="MicrositeContainer_Container__btcXO">
                <div class="MicrositeContainer_StyledBackgroundFilter_5pVB"></div>
                <div class="MicrositeContainer_StyledBackground__1ENPs bg-center bg-cover" style="background-image:url('{{ asset('component/' . $accessMicrosite->component->cover_img )}}')">
                </div>
            </div>
        </div>
        <div class="MicrositeContainer_Container__btcXO">
            <div class="MicrositeContainer_ComponentContainer__c7L7p">
                <div class="flex flex-wrap -m-2 relative z-10">
                    <div id="mcomp-64cfcae6a66629863dc47840" class="w-28 mx-auto relative mb-3">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 flex items-center justify-center bg-gray-200 mx-auto overflow-hidden bg-center bg-cover bg-no-repeat rounded-full">
                            <img src="{{ asset(Auth::user()->profile_picture ) }}" alt="">
                        </div>
                    </div>
                    <div id="" class="Text_Text_v_8Om Text_Text_center40OcD Text_Text_lg_sLpoO"><span style="font-weight:bold">{{ $accessMicrosite->name }}</span></div>
                    <div id="" class="Text_Text_v_8Om Text_Text_center_40OcD"><span>
                            <p>{!! $accessMicrosite->description !!}</p>
                        </span></div>
                        <div class="mt-3 w-full"></div>
                        <div class="HorizontalLink_Container__R74h3">
                        @foreach ($social as $row)
                        <a href="{{ $row->button_link  }}" target="blank" rel="noopener noreferrer" class="HorizontalLink_Link7IF9Z HorizontalLink_Link_circle_S9cau">
                            <i class="{{ $row->button->icon }}"></i>
                        </a>
                        @endforeach
                    </div>
                    @foreach ($social as $row)
                    <div class="Link_LinkContainer__8XFkh">
                        <div class="Link_LinkOuter_CacTs"><a href="{{ $row->button_link  }}" target="_blank" rel="noopener noreferrer" class="Link_LinklcSrg Link_Variant_fullRoundIEVkw Link_Variant_fullRound_whShadow_heIK0">
                                <div class="Link_Icon_WjzGo Link_Icon_fullRound_JzoQ1">
                                    <i class=" {{ $row->button->icon }}"></i>
                                </div>
                                <div class="Link_TextOuter__i2D1Z">
                                    <div style="font-family:&#x27;Montserrat&#x27;, sans-serif" class="Link_Text_hNUN8 Link_Text_center_ZehB9"><strong>{{ $row->button->name_button }}</strong>
                                    </div>
                                </div>
                                <div class="Link_Dummy_e6G9"></div>
                            </a></div>
                    </div>
                    @endforeach
                    <div id="" style="font-size:1em" class="Text_Text_v_8Om Text_Text_center_40OcD">
                        <p node="[object Object]"><strong>Write Your Company Name Here!</strong></p>
                    </div>
                    <div id="" style="font-size:1em" class="Text_Text_v_8Om Text_Text_center_40OcD">
                        <p node="[object Object]">Write Your Company Address Here!</p>
                    </div>
                </div>
            </div>

            <!-- <div class="w-full flex flex-col items-center mt-10 font-worksans">
                    <div class="py-1.5 px-4 rounded-full mb-10 shadow-lg bg-white z-10 hover:-translate-y-1 transition-all">
                        <div class="text-sm font-medium text-center w-full flex items-center justify-center z-10 relative">
                            <p class="text-gray-700">Powered by</p><img src="https://microsite.s.id/images/sid-neu-logo-dark.svg" class="h-7 ml-2 mr-0.5" alt="s.id logo" /><a href="https://home.s.id/?utm_source=sid-microsite&amp;utm_medium=Gmbssss" target="_blank" rel="noopener noreferrer" class="absolute left-0 top-0 w-full h-full"><span class="link"></span></a>
                        </div>
                    </div>
                </div> -->
        </div>
    </section>
    <div style="position:fixed;z-index:999999999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none">
    </div>
</div> --}}
