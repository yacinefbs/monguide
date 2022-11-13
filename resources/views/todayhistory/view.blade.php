@include('globals.header')

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <div class="preloader-dot-loading">
                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                </div>
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>

        <!-- Header -->
        @include('globals.headertop')
        <!-- Start main-content -->
        <div class="main-content">
            <!-- Section: inner-header -->
            <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://placehold.it/1920x885">
                <div class="container pt-70 pb-20">
                    <!-- Section Content -->
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="title text-white">{{ __('todayhistory.seo_title') }}</h1>
                                <ol class="breadcrumb text-left text-black mt-10">
                                    <li><a href="/">{{ __('menu.accueil') }}</a></li>
                                    <!-- <li><a href="#">Pages</a></li> -->
                                    <li class="active text-gray-silver">{{ __('todayhistory.seo_title') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section: Blog -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <div class="schedule-box maxwidth500 bg-light mb-30">
                                <div class="thumb">
                                    <img class="img-fullwidth" alt="" src="https://placehold.it/220x160">
                                    <div class="overlay">
                                        <a href="#"><i class="fa fa-calendar mr-5"></i></a>
                                    </div>
                                </div>
                                <div class="schedule-details clearfix p-15 pt-10">
                                    <h5 class="font-16 title"><a href="#">{{ $todayhistory->title }}</a></h5>
                                    <ul class="list-inline font-11 mb-20">
                                        <li><i class="fa fa-calendar mr-5"></i> {{ $todayhistory->date }}</li>
                                        <!-- <li><i class="fa fa-map-marker mr-5"></i> 89 Newyork City.</li> -->
                                    </ul>
                                    <p>{{ $todayhistory->synopsis }}</p>
                                    <div class="mt-10">
                                        <!-- <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="#">Register</a> -->
                                        <a href="{{ $todayhistory->url }}" class="btn btn-dark btn-sm mt-10" target="_blank">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="sidebar sidebar-left mt-sm-30 ml-40">
                                <div class="widget">
                                    <h4 class="widget-title line-bottom">{{ __('todayhistory.last') }}
                                        <span class="text-theme-colored2">{{ __('todayhistory.today_history')
                                            }}</span>
                                    </h4>
                                    <div class="services-list">
                                        <ul class="list list-border angle-double-right">
                                            @foreach ($lasttodayhistory as $value)
                                            <li class="active"><a href="/{{ $value->code_lang }}/today-history/{{ $value->slug }}/{{ $value->id }}">{{ $value->title }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- end main-content -->
        <script>
            $("button#calculer").click(function(e) {
                e.preventDefault();
                var chiffre = parseFloat($('#chiffre').val());


                var resultat = parseInt(chiffre, 2);

                // console.log('bouton clicked !!!!', resultat_ttc)
                $('#resultat').val(resultat);

            });
        </script>
        <!-- Footer -->
        @include('globals.footer')