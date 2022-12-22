@include('globals.header')

<body class="">
  <div id="wrapper" class="clearfix">
    <!-- preloader -->
    <!--<div id="preloader">-->
    <!--  <div id="spinner">-->
    <!--    <div class="preloader-dot-loading">-->
    <!--      <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--  <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>-->
    <!--</div>-->

    <!-- Header -->
    @include('globals.headertop')
    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: inner-header -->

      <!-- Section: Blog -->
      <section id="courses" class="bg-lighter">
        <div class="container">
          <div class="section-title text-center mt-0">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2 class="mt-0 line-height-1">{{ __('home.last') }} <span class="text-theme-colored2">{{ __('home.todayhistory') }}</span></h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p> -->
              </div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
              @foreach ($todayshistory as $todayhistory)
              <div class="col-sm-6 col-md-4">
                <div class="course bg-white mb-sm-30">
                  <div class="thumb">
                    <img src="http://placehold.it/370x225" alt="">
                  </div>
                  <div class="details p-20">
                    <h3 class="mt-0 mb-0">{{ $todayhistory->title }}</h3>
                    <ul class="list-inline font-11 mb-20">
                      <li><i class="fa fa-calendar mr-5"></i>{{ $todayhistory->date }}</li>
                      <!-- <li><i class="fa fa-map-marker mr-5"></i> 89 Newyork City.</li> -->
                    </ul>
                    <p>{{ substr($todayhistory->synopsis, 0,  133) }} ...</p>
                    <div class="mt-10">
                      <a class="btn btn-dark btn-theme-colored btn-sm mt-10" href="https://monguide.net/{{ $todayhistory->code_lang }}/today-history/{{ $todayhistory->slug }}/{{ $todayhistory->id }}">Details</a>
                      <a href="{{ $todayhistory->url }}" class="btn btn-dark btn-sm mt-10" target="_blank">Source</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- end main-content -->
    <!-- Footer -->
    @include('globals.footer')