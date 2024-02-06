<!-- footer Description -->
@if (get_setting('footer_title') != null || get_setting('footer_description') != null)
    <section class="bg-light border-top border-bottom mt-auto">
        <div class="container py-4">
            <h1 class="fs-18 fw-700 text-gray-dark mb-3">{{ get_setting('footer_title',null, get_system_language()->code) }}</h1>
            <p class="fs-13 text-gray-dark text-justify mb-0">
                {!! nl2br(get_setting('footer_description',null, get_system_language()->code)) !!}
            </p>
        </div>
    </section>
@endif

<!-- footer top Bar -->
<section class="bg-light border-top mt-auto">
    <div class="container px-xs-0">
        <!--  -->
         <div class="row no-gutters">
         <div class="col-md-7 border-left border-soft-light">
             <div class="row no-gutters">
                <!-- Terms & conditions -->
                 <div class="col-md-4 col-6 policy-file">
                    <a class="text-reset h-100  border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('terms') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26.004" height="32" viewBox="0 0 26.004 32">
                            <path id="Union_8" data-name="Union 8" d="M-14508,18932v-.01a6.01,6.01,0,0,1-5.975-5.492h-.021v-14h1v13.5h0a4.961,4.961,0,0,0,4.908,4.994h.091v0h14v1Zm17-4v-1a2,2,0,0,0,2-2h1a3,3,0,0,1-2.927,3Zm-16,0a3,3,0,0,1-3-3h1a2,2,0,0,0,2,2h16v1Zm18-3v-16.994h-4v-1h3.6l-5.6-5.6v3.6h-.01a2.01,2.01,0,0,0,2,2v1a3.009,3.009,0,0,1-3-3h.01v-4h.6l0,0H-14507a2,2,0,0,0-2,2v22h-1v-22a3,3,0,0,1,3-3v0h12l0,0,7,7-.01.01V18925Zm-16-4.992v-1h12v1Zm0-4.006v-1h12v1Zm0-4v-1h12v1Z" transform="translate(14513.998 -18900.002)" fill="#919199"/>
                        </svg>
                        <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Terms & conditions') }}</h4>
                    </a>
                 </div>
                 <!-- Return Policy -->
                 <div class="col-md-4 col-6 policy-file">
                    <a class="text-reset h-100  border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('returnpolicy') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.001" height="23.971" viewBox="0 0 32.001 23.971">
                            <path id="Union_7" data-name="Union 7" d="M-14490,18922.967a6.972,6.972,0,0,0,4.949-2.051,6.944,6.944,0,0,0,2.052-4.943,7.008,7.008,0,0,0-7-7v0h-22.1l7.295,7.295-.707.707-7.779-7.779-.708-.707.708-.7,7.774-7.779.712.707-7.261,7.258H-14490v0a8.01,8.01,0,0,1,8,8,8.008,8.008,0,0,1-8,8Z" transform="translate(14514.001 -18900)" fill="#919199"/>
                        </svg>
                        <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Return Policy') }}</h4>
                    </a>
                 </div>
                 <!-- Delivery Policy -->
                 <div class="col-md-4 policy-file">
                 <a class="text-reset h-100  border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('deliverypolicy') }}">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 64 64" id="delivery-truck"><path d="M62.75,26.3979l-8-9.06A1.0013,1.0013,0,0,0,54,17H41V9a1,1,0,0,0-1-1H2A1,1,0,0,0,1,9V48a1,1,0,0,0,1,1H6.07a7.9923,7.9923,0,0,0,15.861,0H43.07a7.9923,7.9923,0,0,0,15.861,0H62a1,1,0,0,0,1-1V27.06A1.0027,1.0027,0,0,0,62.75,26.3979ZM15,10H27V23.6743l-5.7256-1.6357a.9946.9946,0,0,0-.5488,0L15,23.6743ZM14,54a6,6,0,1,1,6-6A6.0066,6.0066,0,0,1,14,54ZM39,18V47H21.9375c-.015-.12-.041-.2363-.0612-.3546-.018-.1049-.0322-.2108-.0543-.3143-.0346-.1625-.0792-.3209-.1236-.48-.0237-.085-.0425-.1721-.069-.2559q-.1131-.3585-.2576-.7025c-.006-.0141-.0134-.0273-.0194-.0413q-.14-.3247-.3063-.6347c-.0409-.0759-.0882-.1475-.1315-.2219-.0816-.14-.163-.2807-.2527-.4155-.0554-.0832-.1164-.1618-.1747-.2427-.0863-.12-.1723-.24-.265-.3542-.0664-.0822-.1374-.16-.2069-.24-.0932-.1063-.1865-.2121-.285-.3134-.0756-.0778-.1544-.1518-.233-.2264-.1008-.0956-.2024-.19-.308-.28-.0835-.0714-.169-.14-.2555-.2077-.1082-.0853-.2181-.168-.3308-.2477q-.1352-.0954-.274-.1852c-.1164-.0753-.2348-.1468-.3552-.2161-.0955-.0549-.1912-.109-.2892-.16-.1245-.0649-.2516-.1247-.38-.1832-.0994-.0453-.1982-.091-.3-.1323-.134-.0546-.2709-.1024-.4084-.15-.1009-.0348-.2006-.0714-.3033-.1022-.1461-.0438-.2954-.0791-.4448-.1146-.0987-.0234-.1958-.05-.2959-.07-.167-.0331-.3374-.0554-.508-.0778-.0862-.0114-.1707-.0278-.2578-.0364C14.5278,40.0144,14.2656,40,14,40s-.5278.0144-.7869.04c-.0871.0086-.1716.025-.2578.0364-.1706.0224-.341.0447-.508.0778-.1.02-.1972.0468-.2959.07-.1494.0355-.2987.0708-.4448.1146-.1027.0308-.2024.0674-.3033.1022-.1375.0474-.2744.0952-.4084.15-.1015.0413-.2.087-.3.1323-.1282.0585-.2553.1183-.38.1832-.098.0511-.1937.1052-.2892.16-.12.0693-.2388.1408-.3552.2161q-.1392.09-.274.1852c-.1127.08-.2226.1624-.3308.2477-.0865.0679-.172.1363-.2555.2077-.1056.09-.2072.1844-.308.28-.0786.0746-.1574.1486-.233.2264-.0985.1013-.1918.2071-.285.3134-.07.08-.1405.1576-.2069.24-.0927.1147-.1787.2345-.265.3542-.0583.0809-.1193.1595-.1747.2427-.09.1348-.1711.2752-.2527.4155-.0433.0744-.0906.146-.1315.2219q-.1668.3094-.3063.6347c-.006.014-.0134.0272-.0194.0413q-.1452.3432-.2576.7025c-.0265.0838-.0453.1709-.069.2559-.0444.1587-.089.3171-.1236.48-.0221.1035-.0363.2094-.0543.3143-.02.1183-.0462.2346-.0612.3546H3V10H13V25a1,1,0,0,0,1.2744.9614L21,24.04l6.7256,1.9214A1,1,0,0,0,29,25V10H39ZM51,54a6,6,0,1,1,6-6A6.0066,6.0066,0,0,1,51,54Zm10-7H58.9375c-.015-.12-.041-.2363-.0612-.3546-.018-.1049-.0322-.2108-.0543-.3143-.0346-.1625-.0792-.3209-.1236-.48-.0237-.085-.0425-.1721-.069-.2559q-.1131-.3585-.2576-.7025c-.006-.0141-.0134-.0273-.0194-.0413q-.14-.3247-.3063-.6347c-.0409-.0759-.0882-.1475-.1315-.2219-.0816-.14-.163-.2807-.2527-.4155-.0554-.0832-.1164-.1618-.1747-.2427-.0863-.12-.1723-.24-.265-.3542-.0664-.0822-.1374-.16-.2069-.24-.0932-.1063-.1865-.2121-.285-.3134-.0756-.0778-.1544-.1518-.233-.2264-.1008-.0956-.2024-.19-.308-.28-.0835-.0714-.169-.14-.2555-.2077-.1082-.0853-.2181-.168-.3308-.2477q-.1352-.0954-.274-.1852c-.1164-.0753-.2348-.1468-.3552-.2161-.0955-.0549-.1912-.109-.2892-.16-.1245-.0649-.2516-.1247-.38-.1832-.0994-.0453-.1982-.091-.3-.1323-.134-.0546-.2709-.1024-.4084-.15-.1009-.0348-.2006-.0714-.3033-.1022-.1461-.0438-.2954-.0791-.4448-.1146-.0987-.0234-.1958-.05-.2959-.07-.167-.0331-.3374-.0554-.508-.0778-.0862-.0114-.1707-.0278-.2578-.0364C51.5278,40.0144,51.2656,40,51,40s-.5278.0144-.7869.04c-.0871.0086-.1716.025-.2578.0364-.1706.0224-.341.0447-.508.0778-.1.02-.1972.0468-.2959.07-.1494.0355-.2987.0708-.4448.1146-.1027.0308-.2024.0674-.3033.1022-.1375.0474-.2744.0952-.4084.15-.1015.0413-.2.087-.3.1323-.1282.0585-.2553.1183-.38.1832-.098.0511-.1937.1052-.2892.16-.12.0693-.2388.1408-.3552.2161q-.1392.09-.274.1852c-.1127.08-.2226.1624-.3308.2477-.0865.0679-.172.1363-.2555.2077-.1056.09-.2072.1844-.308.28-.0786.0746-.1574.1486-.233.2264-.0985.1013-.1918.2071-.285.3134-.0695.08-.14.1576-.2069.24-.0927.1147-.1787.2345-.265.3542-.0583.0809-.1193.1595-.1747.2427-.09.1348-.1711.2752-.2527.4155-.0433.0744-.0906.146-.1315.2219q-.1668.3094-.3063.6347c-.006.014-.0134.0272-.0194.0413q-.1452.3432-.2576.7025c-.0265.0838-.0453.1709-.069.2559-.0444.1587-.089.3171-.1236.48-.0221.1035-.0363.2094-.0543.3143-.02.1183-.0462.2346-.0612.3546H41V19h4.0642l.9378,14.0664A1,1,0,0,0,47,34H61Zm0-15H47.9355l-.8664-13h6.48L61,27.4385Z"></path></svg>
                    <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Delivery Policy') }}</h4>
                </a>
                 </div>
             </div>
         </div>
         <div class="col-md-5">
            <div class="row no-gutters">
                <!-- Cancellation Policy -->
                <div class="col-md-6 col-6 policy-file">
                    <a class="text-reset h-100  border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('cancellationpolicy') }}">
                        
                        <svg id="SvgjsSvg1066" width="34" height="34" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1067"></defs><g id="SvgjsG1068"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="34" height="34"><g data-name="Layer 2" fill="#424242" class="color000 svgShape"><path fill="#d4d4d4" d="M23 2h6l4 15v12l-7-4-7 4V17l4-15z" class="colorffba17 svgShape"></path><circle cx="50" cy="43" r="12" fill="#d4d4d4" class="colorffba17 svgShape"></circle><path fill="#353535" d="M53.707 45.293a1 1 0 1 1-1.414 1.414L50 44.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L48.586 43l-2.293-2.293a1 1 0 0 1 1.414-1.414L50 41.586l2.293-2.293a1 1 0 0 1 1.414 1.414L51.414 43ZM15 48H7a1 1 0 0 0 0 2h8a1 1 0 0 0 0-2Zm-9 5a1 1 0 0 1 1-1h6a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1Zm10 4a1 1 0 0 1-1 1H7a1 1 0 0 1 0-2h8a1 1 0 0 1 1 1Zm47-14a13.009 13.009 0 0 0-12-12.95V17a1 1 0 0 0-.168-.555l-9.406-14.11A2.993 2.993 0 0 0 38.93 1H13.07a2.993 2.993 0 0 0-2.496 1.336l-9.406 14.11A1 1 0 0 0 1 17v43a3.003 3.003 0 0 0 3 3h44a3.003 3.003 0 0 0 3-3v-4.05A13.009 13.009 0 0 0 63 43ZM39.762 3.445 48.132 16H33.767L30.302 3h8.628a.997.997 0 0 1 .832.445ZM20 18h12v9.276l-5.504-3.144a1 1 0 0 0-.992 0L20 27.276Zm8.232-15 3.466 13H20.302l3.466-13Zm-15.994.445A.997.997 0 0 1 13.07 3h8.628l-3.466 13H3.869ZM48 61H4a1 1 0 0 1-1-1V18h15v11a1 1 0 0 0 1.496.868L26 26.151l6.504 3.717A1 1 0 0 0 34 29V18h15v12.05a12.987 12.987 0 0 0 0 25.9V60a1 1 0 0 1-1 1Zm2-7a11 11 0 1 1 11-11 11.012 11.012 0 0 1-11 11Z" class="color231f20 svgShape"></path></g></svg></g></svg>
                        
                        <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Cancellation Policy') }}</h4>
                    </a>
                </div>
                <!-- Privacy Policy -->
                <div class="col-md-6 col-6 policy-file">
                    <a class="text-reset h-100 border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('privacypolicy') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <g id="Group_24236" data-name="Group 24236" transform="translate(-1454.002 -2430.002)">
                            <path id="Subtraction_11" data-name="Subtraction 11" d="M-14498,18932a15.894,15.894,0,0,1-11.312-4.687A15.909,15.909,0,0,1-14514,18916a15.884,15.884,0,0,1,4.685-11.309A15.9,15.9,0,0,1-14498,18900a15.909,15.909,0,0,1,11.316,4.688A15.885,15.885,0,0,1-14482,18916a15.9,15.9,0,0,1-4.687,11.316A15.909,15.909,0,0,1-14498,18932Zm0-31a14.9,14.9,0,0,0-10.605,4.393A14.9,14.9,0,0,0-14513,18916a14.9,14.9,0,0,0,4.395,10.607A14.9,14.9,0,0,0-14498,18931a14.9,14.9,0,0,0,10.607-4.393A14.9,14.9,0,0,0-14483,18916a14.9,14.9,0,0,0-4.393-10.607A14.9,14.9,0,0,0-14498,18901Z" transform="translate(15968 -16470)" fill="#919199"/>
                            <g id="Group_24196" data-name="Group 24196" transform="translate(0 -1)">
                                <rect id="Rectangle_18406" data-name="Rectangle 18406" width="2" height="10" transform="translate(1469 2440)" fill="#919199"/>
                                <rect id="Rectangle_18407" data-name="Rectangle 18407" width="2" height="2" transform="translate(1469 2452)" fill="#919199"/>
                            </g>
                            </g>
                        </svg>
                        <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Privacy Policy') }}</h4>
                    </a>
                </div>
            </div>
         </div>
     </div>
     <!--  -->
       
    </div>
</section>

<!-- footer subscription & icons -->
<section class="py-3 text-light footer-widget border-bottom" style="border-color: #3d3d46 !important; background-color: #212129 !important;">
    <div class="container">
        <!-- footer logo -->
        <div class="mt-3 mb-4">
            <a href="{{ route('home') }}" class="d-block">
                @if(get_setting('footer_logo') != null)
                    <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset(get_setting('footer_logo')) }}" alt="{{ env('APP_NAME') }}" height="44" style="height: 44px;">
                @else
                    <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" height="44" style="height: 44px;">
                @endif
            </a>
        </div>
        <div class="row">
            <!-- about & subscription -->
            <div class="col-xl-6 col-lg-7">
                <div class="mb-4 text-secondary text-justify">
                    {!! get_setting('about_us_description',null,App::getLocale()) !!}
                </div>
                <h5 class="fs-14 fw-700 text-soft-light mt-1 mb-3">{{ translate('Subscribe to our newsletter for regular updates about Offers, Coupons & more') }}</h5>
                <div class="mb-3">
                    <form method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="row gutters-10">
                            <div class="col-8">
                                <input type="email" class="form-control border-secondary rounded-0 text-white w-100 bg-transparent" placeholder="{{ translate('Your Email Address') }}" name="email" required>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary rounded-0 w-100">{{ translate('Subscribe') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col d-none d-lg-block"></div>

            <!-- Follow & Apps -->
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <!-- Social -->
                @if ( get_setting('show_social_links') )
                    <h5 class="fs-14 fw-700 text-secondary text-uppercase mt-3 mt-lg-0">{{ translate('Follow Us') }}</h5>
                    <ul class="list-inline social colored mb-4">
                        @if (!empty(get_setting('facebook_link')))
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="{{ get_setting('facebook_link') }}" target="_blank"
                                    class="facebook"><i class="lab la-facebook-f"></i></a>
                            </li>
                        @endif
                        @if (!empty(get_setting('twitter_link')))
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="{{ get_setting('twitter_link') }}" target="_blank"
                                    class="twitter"><i class="lab la-twitter"></i></a>
                            </li>
                        @endif
                        @if (!empty(get_setting('instagram_link')))
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="{{ get_setting('instagram_link') }}" target="_blank"
                                    class="instagram"><i class="lab la-instagram"></i></a>
                            </li>
                        @endif
                        @if (!empty(get_setting('youtube_link')))
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="{{ get_setting('youtube_link') }}" target="_blank"
                                    class="youtube"><i class="lab la-youtube"></i></a>
                            </li>
                        @endif
                        @if (!empty(get_setting('linkedin_link')))
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="{{ get_setting('linkedin_link') }}" target="_blank"
                                    class="linkedin"><i class="lab la-linkedin-in"></i></a>
                            </li>
                        @endif
                    </ul>
                @endif

                <!-- Apps link -->
                @if((get_setting('play_store_link') != null) || (get_setting('app_store_link') != null))
                    <h5 class="fs-14 fw-700 text-secondary text-uppercase mt-3">{{ translate('Mobile Apps') }}</h5>
                    <div class="d-flex mt-3">
                        <div class="">
                            <a href="{{ get_setting('play_store_link') }}" target="_blank" class="mr-2 mb-2 overflow-hidden hov-scale-img">
                                <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/play.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                            </a>
                        </div>
                        <div class="">
                            <a href="{{ get_setting('app_store_link') }}" target="_blank" class="overflow-hidden hov-scale-img">
                                <img class="lazyload has-transition" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ static_asset('assets/img/app.png') }}" alt="{{ env('APP_NAME') }}" height="44">
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

@php
    $col_values = ((get_setting('vendor_system_activation') == 1) || addon_is_activated('delivery_boy')) ? "col-lg-3 col-md-6 col-sm-6" : "col-md-4 col-sm-6";
@endphp
<section class="py-lg-3 text-light footer-widget" style="background-color: #212129 !important;">
    <!-- footer widgets ========== [Accordion Fotter widgets are bellow from this]-->
    <div class="container d-none d-lg-block">
        <div class="row">
            <!-- Quick links -->
            <div class="{{ $col_values }}">
                <div class="text-center text-sm-left mt-4">
                    <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">
                        {{ get_setting('widget_one',null,App::getLocale()) }}
                    </h4>
                    <ul class="list-unstyled">
                        @if ( get_setting('widget_one_labels',null,App::getLocale()) !=  null )
                            @foreach (json_decode( get_setting('widget_one_labels',null,App::getLocale()), true) as $key => $value)
                            @php
								$widget_one_links = '';
								if(isset(json_decode(get_setting('widget_one_links'), true)[$key])) {
									$widget_one_links = json_decode(get_setting('widget_one_links'), true)[$key];
								}
							@endphp
                            <li class="mb-2">
                                <a href="{{ $widget_one_links }}" class="fs-13 text-soft-light animate-underline-white">
                                    {{ $value }}
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Contacts -->
            <div class="{{ $col_values }}">
                <div class="text-center text-sm-left mt-4">
                    <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">{{ translate('Contacts') }}</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <p  class="fs-13 text-secondary mb-1">{{ translate('Address') }}</p>
                            <p  class="fs-13 text-soft-light">{{ get_setting('contact_address',null,App::getLocale()) }}</p>
                        </li>
                        <li class="mb-2">
                            <p  class="fs-13 text-secondary mb-1">{{ translate('Phone') }}</p>
                            <p  class="fs-13 text-soft-light">{{ get_setting('contact_phone') }}</p>
                        </li>
                        <li class="mb-2">
                            <p  class="fs-13 text-secondary mb-1">{{ translate('Email') }}</p>
                            <p  class="">
                                <a href="mailto:{{ get_setting('contact_email') }}" class="fs-13 text-soft-light hov-text-primary">{{ get_setting('contact_email')  }}</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- My Account -->
            <div class="{{ $col_values }}">
                <div class="text-center text-sm-left mt-4">
                    <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">{{ translate('My Account') }}</h4>
                    <ul class="list-unstyled">
                        @if (Auth::check())
                            <li class="mb-2">
                                <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('logout') }}">
                                    {{ translate('Logout') }}
                                </a>
                            </li>
                        @else
                            <li class="mb-2">
                                <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('user.login') }}">
                                    {{ translate('Login') }}
                                </a>
                            </li>
                        @endif
                        <li class="mb-2">
                            <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('purchase_history.index') }}">
                                {{ translate('Order History') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('wishlists.index') }}">
                                {{ translate('My Wishlist') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('orders.track') }}">
                                {{ translate('Track Order') }}
                            </a>
                        </li>
                        @if (addon_is_activated('affiliate_system'))
                            <li class="mb-2">
                                <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('affiliate.apply') }}">
                                    {{ translate('Be an affiliate partner')}}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Seller & Delivery Boy -->
            @if ((get_setting('vendor_system_activation') == 1) || addon_is_activated('delivery_boy'))
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="text-center text-sm-left mt-4">
                    <!-- Seller -->
                    @if (get_setting('vendor_system_activation') == 1)
                        <h4 class="fs-14 text-secondary text-uppercase fw-700 mb-3">{{ translate('Seller Zone') }}</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <p class="fs-13 text-soft-light mb-0">
                                    {{ translate('Become A Seller') }} 
                                    <a href="{{ route('shops.create') }}" class="fs-13 fw-700 text-warning ml-2">{{ translate('Apply Now') }}</a>
                                </p>
                            </li>
                            @guest
                                <li class="mb-2">
                                    <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('seller.login') }}">
                                        {{ translate('Login to Seller Panel') }}
                                    </a>
                                </li>
                            @endguest
                            @if(get_setting('seller_app_link'))
                                <li class="mb-2">
                                    <a class="fs-13 text-soft-light animate-underline-white" target="_blank" href="{{ get_setting('seller_app_link')}}">
                                        {{ translate('Download Seller App') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endif

                    <!-- Delivery Boy -->
                    @if (addon_is_activated('delivery_boy'))
                        <h4 class="fs-14 text-secondary text-uppercase fw-700 mt-4 mb-3">{{ translate('Delivery Boy') }}</h4>
                        <ul class="list-unstyled">
                            @guest
                                <li class="mb-2">
                                    <a class="fs-13 text-soft-light animate-underline-white" href="{{ route('deliveryboy.login') }}">
                                        {{ translate('Login to Delivery Boy Panel') }}
                                    </a>
                                </li>
                            @endguest
                            
                            @if(get_setting('delivery_boy_app_link'))
                                <li class="mb-2">
                                    <a class="fs-13 text-soft-light animate-underline-white" target="_blank" href="{{ get_setting('delivery_boy_app_link')}}">
                                        {{ translate('Download Delivery Boy App') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Accordion Fotter widgets -->
    <div class="d-lg-none bg-transparent">
        <!-- Quick links -->
        <div class="aiz-accordion-wrap bg-black">
            <div class="aiz-accordion-heading container bg-black">
                <button class="aiz-accordion fs-14 text-white bg-transparent">{{ get_setting('widget_one',null,App::getLocale()) }}</button>
            </div>
            <div class="aiz-accordion-panel bg-transparent" style="background-color: #212129 !important;">
                <div class="container">
                    <ul class="list-unstyled mt-3">
                        @if ( get_setting('widget_one_labels',null,App::getLocale()) !=  null )
                            @foreach (json_decode( get_setting('widget_one_labels',null,App::getLocale()), true) as $key => $value)
							@php
								$widget_one_links = '';
								if(isset(json_decode(get_setting('widget_one_links'), true)[$key])) {
									$widget_one_links = json_decode(get_setting('widget_one_links'), true)[$key];
								}
							@endphp
                            <li class="mb-2 pb-2 @if (url()->current() == $widget_one_links) active @endif">
                                <a href="{{ $widget_one_links }}" class="fs-13 text-soft-light text-sm-secondary animate-underline-white">
                                    {{ $value }}
                                </a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Contacts -->
        <div class="aiz-accordion-wrap bg-black">
            <div class="aiz-accordion-heading container bg-black">
                <button class="aiz-accordion fs-14 text-white bg-transparent">{{ translate('Contacts') }}</button>
            </div>
            <div class="aiz-accordion-panel bg-transparent" style="background-color: #212129 !important;">
                <div class="container">
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2">
                            <p  class="fs-13 text-secondary mb-1">{{ translate('Address') }}</p>
                            <p  class="fs-13 text-soft-light">{{ get_setting('contact_address',null,App::getLocale()) }}</p>
                        </li>
                        <li class="mb-2">
                            <p  class="fs-13 text-secondary mb-1">{{ translate('Phone') }}</p>
                            <p  class="fs-13 text-soft-light">{{ get_setting('contact_phone') }}</p>
                        </li>
                        <li class="mb-2">
                            <p  class="fs-13 text-secondary mb-1">{{ translate('Email') }}</p>
                            <p  class="">
                                <a href="mailto:{{ get_setting('contact_email') }}" class="fs-13 text-soft-light hov-text-primary">{{ get_setting('contact_email')  }}</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- My Account -->
        <div class="aiz-accordion-wrap bg-black">
            <div class="aiz-accordion-heading container bg-black">
                <button class="aiz-accordion fs-14 text-white bg-transparent">{{ translate('My Account') }}</button>
            </div>
            <div class="aiz-accordion-panel bg-transparent" style="background-color: #212129 !important;">
                <div class="container">
                    <ul class="list-unstyled mt-3">
                        @auth
                            <li class="mb-2 pb-2">
                                <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('logout') }}">
                                    {{ translate('Logout') }}
                                </a>
                            </li>
                        @else
                            <li class="mb-2 pb-2 {{ areActiveRoutes(['user.login'],' active')}}">
                                <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('user.login') }}">
                                    {{ translate('Login') }}
                                </a>
                            </li>
                        @endauth
                        <li class="mb-2 pb-2 {{ areActiveRoutes(['purchase_history.index'],' active')}}">
                            <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('purchase_history.index') }}">
                                {{ translate('Order History') }}
                            </a>
                        </li>
                        <li class="mb-2 pb-2 {{ areActiveRoutes(['wishlists.index'],' active')}}">
                            <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('wishlists.index') }}">
                                {{ translate('My Wishlist') }}
                            </a>
                        </li>
                        <li class="mb-2 pb-2 {{ areActiveRoutes(['orders.track'],' active')}}">
                            <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('orders.track') }}">
                                {{ translate('Track Order') }}
                            </a>
                        </li>
                        @if (addon_is_activated('affiliate_system'))
                            <li class="mb-2 pb-2 {{ areActiveRoutes(['affiliate.apply'],' active')}}">
                                <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('affiliate.apply') }}">
                                    {{ translate('Be an affiliate partner')}}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Seller -->
        @if (get_setting('vendor_system_activation') == 1)
        <div class="aiz-accordion-wrap bg-black">
            <div class="aiz-accordion-heading container bg-black">
                <button class="aiz-accordion fs-14 text-white bg-transparent">{{ translate('Seller Zone') }}</button>
            </div>
            <div class="aiz-accordion-panel bg-transparent" style="background-color: #212129 !important;">
                <div class="container">
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2 pb-2 {{ areActiveRoutes(['shops.create'],' active')}}">
                            <p class="fs-13 text-soft-light text-sm-secondary mb-0">
                                {{ translate('Become A Seller') }} 
                                <a href="{{ route('shops.create') }}" class="fs-13 fw-700 text-warning ml-2">{{ translate('Apply Now') }}</a>
                            </p>
                        </li>
                        @guest
                            <li class="mb-2 pb-2 {{ areActiveRoutes(['deliveryboy.login'],' active')}}">
                                <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('seller.login') }}">
                                    {{ translate('Login to Seller Panel') }}
                                </a>
                            </li>
                        @endguest
                        @if(get_setting('seller_app_link'))
                            <li class="mb-2 pb-2">
                                <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" target="_blank" href="{{ get_setting('seller_app_link')}}">
                                    {{ translate('Download Seller App') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Delivery Boy -->
        @if (addon_is_activated('delivery_boy'))
        <div class="aiz-accordion-wrap bg-black">
            <div class="aiz-accordion-heading container bg-black">
                <button class="aiz-accordion fs-14 text-white bg-transparent">{{ translate('Delivery Boy') }}</button>
            </div>
            <div class="aiz-accordion-panel bg-transparent" style="background-color: #212129 !important;">
                <div class="container">
                    <ul class="list-unstyled mt-3">
                        @guest
                            <li class="mb-2 pb-2 {{ areActiveRoutes(['deliveryboy.login'],' active')}}">
                                <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" href="{{ route('deliveryboy.login') }}">
                                    {{ translate('Login to Delivery Boy Panel') }}
                                </a>
                            </li>
                        @endguest
                        @if(get_setting('delivery_boy_app_link'))
                            <li class="mb-2 pb-2">
                                <a class="fs-13 text-soft-light text-sm-secondary animate-underline-white" target="_blank" href="{{ get_setting('delivery_boy_app_link')}}">
                                    {{ translate('Download Delivery Boy App') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-soft-light">
    <div class="container">
        <div class="row align-items-center py-3">
            <!-- Copyright -->
            <div class="col-lg-6 order-1 order-lg-0">
                <div class="text-center text-lg-left fs-14" current-verison="{{get_setting("current_version")}}">
                    {!! get_setting('frontend_copyright_text', null, App::getLocale()) !!}
                </div>
            </div>

            <!-- Payment Method Images -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="text-center text-lg-right">
                    <ul class="list-inline mb-0">
                        @if ( get_setting('payment_method_images') !=  null )
                            @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                <li class="list-inline-item mr-3">
                                    <img src="{{ uploaded_asset($value) }}" height="20" class="mw-100 h-auto" style="max-height: 20px" alt="{{ translate('payment_method') }}">
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile bottom nav -->
<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom border-top border-sm-bottom border-sm-left border-sm-right mx-auto mb-sm-2" style="background-color: rgb(255 255 255 / 90%)!important;">
    <div class="row align-items-center gutters-5">
        <!-- Home -->
        <div class="col">
            <a href="{{ route('home') }}" class="text-secondary d-block text-center pb-2 pt-3 {{ areActiveRoutes(['home'],'svg-active')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <g id="Group_24768" data-name="Group 24768" transform="translate(3495.144 -602)">
                      <path id="Path_2916" data-name="Path 2916" d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z" transform="translate(-3495.144 602)" fill="#b5b5bf"/>
                    </g>
                </svg>
                <span class="d-block mt-1 fs-10 fw-600 text-reset {{ areActiveRoutes(['home'],'text-primary')}}">{{ translate('Home') }}</span>
            </a>
        </div>

        <!-- Categories -->
        <div class="col">
            <a href="{{ route('categories.all') }}" class="text-secondary d-block text-center pb-2 pt-3 {{ areActiveRoutes(['categories.all'],'svg-active')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <g id="Group_25497" data-name="Group 25497" transform="translate(3373.432 -602)">
                      <path id="Path_2917" data-name="Path 2917" d="M126.713,0h-5V5a2,2,0,0,0,2,2h3a2,2,0,0,0,2-2V2a2,2,0,0,0-2-2m1,5a1,1,0,0,1-1,1h-3a1,1,0,0,1-1-1V1h4a1,1,0,0,1,1,1Z" transform="translate(-3495.144 602)" fill="#91919c"/>
                      <path id="Path_2918" data-name="Path 2918" d="M144.713,18h-3a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h5V20a2,2,0,0,0-2-2m1,6h-4a1,1,0,0,1-1-1V20a1,1,0,0,1,1-1h3a1,1,0,0,1,1,1Z" transform="translate(-3504.144 593)" fill="#91919c"/>
                      <path id="Path_2919" data-name="Path 2919" d="M143.213,0a3.5,3.5,0,1,0,3.5,3.5,3.5,3.5,0,0,0-3.5-3.5m0,6a2.5,2.5,0,1,1,2.5-2.5,2.5,2.5,0,0,1-2.5,2.5" transform="translate(-3504.144 602)" fill="#91919c"/>
                      <path id="Path_2920" data-name="Path 2920" d="M125.213,18a3.5,3.5,0,1,0,3.5,3.5,3.5,3.5,0,0,0-3.5-3.5m0,6a2.5,2.5,0,1,1,2.5-2.5,2.5,2.5,0,0,1-2.5,2.5" transform="translate(-3495.144 593)" fill="#91919c"/>
                    </g>
                </svg>
                <span class="d-block mt-1 fs-10 fw-600 text-reset {{ areActiveRoutes(['categories.all'],'text-primary')}}">{{ translate('Categories') }}</span>
            </a>
        </div>
        @php
            $cart = get_user_cart();
        @endphp

        <!-- Cart -->
        @php
            $count = (isset($cart) && count($cart)) ? count($cart) : 0;
        @endphp
        <div class="col-auto">
            <a href="{{ route('cart') }}" class="text-secondary d-block text-center pb-2 pt-3 px-3 {{ areActiveRoutes(['cart'],'svg-active')}}">
                <span class="d-inline-block position-relative px-2">
                    <svg id="Group_25499" data-name="Group 25499" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16.001" height="16" viewBox="0 0 16.001 16">
                        <defs>
                        <clipPath id="clip-pathw">
                            <rect id="Rectangle_1383" data-name="Rectangle 1383" width="16" height="16" fill="#91919c"/>
                        </clipPath>
                        </defs>
                        <g id="Group_8095" data-name="Group 8095" transform="translate(0 0)" clip-path="url(#clip-pathw)">
                        <path id="Path_2926" data-name="Path 2926" d="M8,24a2,2,0,1,0,2,2,2,2,0,0,0-2-2m0,3a1,1,0,1,1,1-1,1,1,0,0,1-1,1" transform="translate(-3 -11.999)" fill="#91919c"/>
                        <path id="Path_2927" data-name="Path 2927" d="M24,24a2,2,0,1,0,2,2,2,2,0,0,0-2-2m0,3a1,1,0,1,1,1-1,1,1,0,0,1-1,1" transform="translate(-10.999 -11.999)" fill="#91919c"/>
                        <path id="Path_2928" data-name="Path 2928" d="M15.923,3.975A1.5,1.5,0,0,0,14.5,2h-9a.5.5,0,1,0,0,1h9a.507.507,0,0,1,.129.017.5.5,0,0,1,.355.612l-1.581,6a.5.5,0,0,1-.483.372H5.456a.5.5,0,0,1-.489-.392L3.1,1.176A1.5,1.5,0,0,0,1.632,0H.5a.5.5,0,1,0,0,1H1.544a.5.5,0,0,1,.489.392L3.9,9.826A1.5,1.5,0,0,0,5.368,11h7.551a1.5,1.5,0,0,0,1.423-1.026Z" transform="translate(0 -0.001)" fill="#91919c"/>
                        </g>
                    </svg>
                    @if($count > 0)
                        <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right" style="right: 5px;top: -2px;"></span>
                    @endif
                </span>
                <span class="d-block mt-1 fs-10 fw-600 text-reset {{ areActiveRoutes(['cart'],'text-primary')}}">
                    {{ translate('Cart') }}
                    (<span class="cart-count">{{$count}}</span>)
                </span>
            </a>
        </div>

        <!-- Notifications -->
        <div class="col">
            <a href="{{ route('all-notifications') }}" class="text-secondary d-block text-center pb-2 pt-3 {{ areActiveRoutes(['all-notifications'],'svg-active')}}">
                <span class="d-inline-block position-relative px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13.6" height="16" viewBox="0 0 13.6 16">
                        <path id="ecf3cc267cd87627e58c1954dc6fbcc2" d="M5.488,14.056a.617.617,0,0,0-.8-.016.6.6,0,0,0-.082.855A2.847,2.847,0,0,0,6.835,16h0l.174-.007a2.846,2.846,0,0,0,2.048-1.1h0l.053-.073a.6.6,0,0,0-.134-.782.616.616,0,0,0-.862.081,1.647,1.647,0,0,1-.334.331,1.591,1.591,0,0,1-2.222-.331H5.55ZM6.828,0C4.372,0,1.618,1.732,1.306,4.512h0v1.45A3,3,0,0,1,.6,7.37a.535.535,0,0,0-.057.077A3.248,3.248,0,0,0,0,9.088H0l.021.148a3.312,3.312,0,0,0,.752,2.2,3.909,3.909,0,0,0,2.5,1.232,32.525,32.525,0,0,0,7.1,0,3.865,3.865,0,0,0,2.456-1.232A3.264,3.264,0,0,0,13.6,9.249h0v-.1a3.361,3.361,0,0,0-.582-1.682h0L12.96,7.4a3.067,3.067,0,0,1-.71-1.408h0V4.54l-.039-.081a.612.612,0,0,0-1.132.208h0v1.45a.363.363,0,0,0,0,.077,4.21,4.21,0,0,0,.979,1.957,2.022,2.022,0,0,1,.312,1h0v.155a2.059,2.059,0,0,1-.468,1.373,2.656,2.656,0,0,1-1.661.788,32.024,32.024,0,0,1-6.87,0,2.663,2.663,0,0,1-1.7-.824,2.037,2.037,0,0,1-.447-1.33h0V9.151a2.1,2.1,0,0,1,.305-1.007A4.212,4.212,0,0,0,2.569,6.187a.363.363,0,0,0,0-.077h0V4.653a4.157,4.157,0,0,1,4.2-3.442,4.608,4.608,0,0,1,2.257.584h0l.084.042A.615.615,0,0,0,9.649,1.8.6.6,0,0,0,9.624.739,5.8,5.8,0,0,0,6.828,0Z" fill="#91919b"/>
                    </svg>
                    @if(Auth::check() && count(Auth::user()->unreadNotifications) > 0)
                        <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right" style="right: 5px;top: -2px;"></span>
                    @endif
                </span>
                <span class="d-block mt-1 fs-10 fw-600 text-reset {{ areActiveRoutes(['all-notifications'],'text-primary')}}">{{ translate('Notifications') }}</span>
            </a>
        </div>

        <!-- Account -->
        <div class="col">
            @if (Auth::check())
                @if(isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="text-secondary d-block text-center pb-2 pt-3">
                        <span class="d-block mx-auto">
                            @if(Auth::user()->photo != null)
                                <img src="{{ custom_asset(Auth::user()->avatar_original)}}" alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                            @else
                                <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                            @endif
                        </span>
                        <span class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                    </a>
                @elseif(isSeller())
                    <a href="{{ route('dashboard') }}" class="text-secondary d-block text-center pb-2 pt-3">
                        <span class="d-block mx-auto">
                            @if(Auth::user()->photo != null)
                                <img src="{{ custom_asset(Auth::user()->avatar_original)}}" alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                            @else
                                <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                            @endif
                        </span>
                        <span class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                    </a>
                @else
                    <a href="javascript:void(0)" class="text-secondary d-block text-center pb-2 pt-3 mobile-side-nav-thumb" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
                        <span class="d-block mx-auto">
                            @if(Auth::user()->photo != null)
                                <img src="{{ custom_asset(Auth::user()->avatar_original)}}" alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                            @else
                                <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="{{ translate('avatar') }}" class="rounded-circle size-20px">
                            @endif
                        </span>
                        <span class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                    </a>
                @endif
            @else
                <a href="{{ route('user.login') }}" class="text-secondary d-block text-center pb-2 pt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                          <path id="Path_2924" data-name="Path 2924" d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3" transform="translate(-3499.144 602)" fill="#b5b5bf"/>
                          <path id="Path_2925" data-name="Path 2925" d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4" transform="translate(-3495.144 592)" fill="#b5b5bf"/>
                        </g>
                    </svg>
                    <span class="d-block mt-1 fs-10 fw-600 text-reset">{{ translate('My Account') }}</span>
                </a>
            @endif
        </div>

    </div>
</div>

<!-- User Side nav -->
@if (Auth::check() && !isAdmin())
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            @include('frontend.inc.user_side_nav')
        </div>
    </div>
@endif
