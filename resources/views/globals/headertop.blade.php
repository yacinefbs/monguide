<header id="header" class="header modern-header modern-header-theme-colored">
    <!-- <div class="header-top bg-theme-colored2 sm-text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="widget text-white">
                        <i class="fa fa-clock-o text-theme-colored"></i> Opening Hours: Mon - Tues : 6.00 am - 10.00 pm,
                        Sunday Closed
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <ul class="list-inline text-right flip sm-text-center">
                            <li>
                                <a class="text-white" href="#">FAQ</a>
                            </li>
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="#">Help Desk</a>
                            </li>
                            <li class="text-white">|</li>
                            <li>
                                <a class="text-white" href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="header-middle p-0 bg-light xs-text-center pb-30">
        <div class="container pt-20 pb-20">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="/{{ Config::get('app.locale') }}/"><img
                            src="{{ asset('images/logo-wide.png') }}" alt=""></a>
                </div>
                <!--<div class="col-xs-12 col-sm-4 col-md-3 float-right">
                    <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                        <i
                            class="fa fa-envelope text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                        <a href="#" class="font-12 text-gray text-uppercase">Mail Us Today</a>
                        <h5 class="font-13 text-black m-0"> <?= env('EMAIL_CONTACT') ?></h5>
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                        <i
                            class="fa fa-phone-square text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                        <a href="#" class="font-12 text-gray text-uppercase">Call us for more details</a>
                        <h5 class="font-13 text-black m-0"> +(012) 345 6789</h5>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
                        <i
                            class="fa fa-building-o text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
                        <a href="#" class="font-12 text-gray text-uppercase">Company Location</a>
                        <h5 class="font-13 text-black m-0"> 121 King Street, Melbourne</h5>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="header-nav">
        <div class="header-nav-wrapper navbar-scrolltofixed">
            <div class="container">
                <nav id="menuzord" class="menuzord red">
                    <ul class="menuzord-menu">
                        <li class="active">
                            <a href="#home">{{ __('menu.accueil') }}</a>
                        </li>
                        <li>
                            <a href="/{{ Config::get('app.locale') }}/prix-ttc">{{ __('menu.calcul_prix_ttc') }}</a>
                        </li>
                        <li>
                            <a href="/{{ Config::get('app.locale') }}/prix-ht">{{ __('menu.calcul_prix_ht') }}</a>
                        </li>
                        <li>
                            <a href="/{{ Config::get('app.locale') }}/prix-tva">{{ __('menu.calcul_prix_tva') }}</a>
                        </li>
                        <li>
                            <a href="/{{ Config::get('app.locale') }}/binary-decimal">{{ __('menu.convertisseur_bin_dec') }}</a>
                        </li>
                        
                        <!-- <li class="active pull-right">
                            <a class="btn btn-colored btn-flat btn-theme-colored ajaxload-popup"
                                href="ajax-load/reservation-form.html">
                                Register Now
                            </a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Global - Horizontal -->
<!-- <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3690879797577737"
     data-ad-slot="7505997147"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->