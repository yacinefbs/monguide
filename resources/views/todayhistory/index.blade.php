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
                        <div class="col-md-12 blog-pull-right">
                            <div class="row">
                            @foreach ($todayshistory as $todayhistory)
                                <div class="col-sm-6 col-md-6 col-lg-6">
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
                                                <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="/{{ Config::get('app.locale') }}/today-history/{{ $todayhistory->slug }}/{{ $todayhistory->id }}">Details</a>
                                                <a href="{{ $todayhistory->url }}" class="btn btn-dark btn-sm mt-10" target="_blank">Source</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- <div class="row">
                                <div class="col-sm-12">
                                    <nav>
                                        <ul class="pagination theme-colored pull-right xs-pull-center mb-xs-40">
                                            <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">...</a></li>
                                            <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- end main-content -->
        <!-- Footer -->
        @include('globals.footer')