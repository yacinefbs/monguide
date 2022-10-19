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
      <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="http://placehold.it/1920x885">
        <div class="container pt-70 pb-20">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12">
              <h1 class="title text-white">{{ __('prix_tva.titre') }}</h1>
                <ol class="breadcrumb text-left text-black mt-10">
                  <li><a href="/">{{ __('menu.accueil') }}</a></li>
                  <!-- <li><a href="#">Pages</a></li> -->
                  <li class="active text-gray-silver">{{ __('prix_tva.titre') }}</li>
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
            <div class="col-md-8 blog-pull-right">
              <div class="single-service">
                <img src="http://placehold.it/750x500" alt="">
                <h3 class="text-theme-colored line-bottom text-theme-colored">{{ __('prix_tva.titre')
                  }}</h3>
                <!-- Form debut -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>{{ __('prix_ttc_ht.prix_ht') }} <small>*</small></label>
                      <input id="prix_ht" name="form_email" class="form-control required" type="text"
                        placeholder="{{ __('prix_ttc_ht.entrer_prix_ht') }}" aria-required="true" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>{{ __('prix_ttc_ht.prix_ttc') }} <small>*</small></label>
                      <input id="prix_ttc" name="form_email" class="form-control required" type="text"
                        placeholder="{{ __('prix_ttc_ht.resultat_ttc') }}" aria-required="true" >
                    </div>
                    
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>{{ __('prix_ttc_ht.taux_tva') }}<small>*</small></label>
                    <input id="taux_tva" name="form_name" class="form-control" type="text"
                      placeholder="{{ __('prix_ttc_ht.resultat_prix_tva') }}" required="" aria-required="true" disabled>
                  </div>
                </div>
                <div class="col-sm-12"></div>
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button id="calculer" type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5"
                    data-loading-text="{{ __('prix_ttc_ht.message_wait') }}">{{ __('global.btn_calculer') }}</button>
                  <!-- <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button> -->
                </div>
                <!-- Form fin -->
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="sidebar sidebar-left mt-sm-30 ml-40">
                <div class="widget">
                  <h4 class="widget-title line-bottom">{{ __('prix_ttc_ht.liste_des_formules_1') }}
                    <span class="text-theme-colored2">{{ __('prix_ttc_ht.liste_des_formules_2')
                      }}</span>
                  </h4>
                  <div class="services-list">
                    <ul class="list list-border angle-double-right">
                      <li class="active"><a href="/{{ Config::get('app.locale') }}/prix-ttc">{{
                          __('menu.calcul_prix_ttc') }}</a>
                      </li>
                      <li><a href="/{{ Config::get('app.locale') }}/prix-ht">{{
                          __('menu.calcul_prix_ht') }}</a></li>
                      <li><a href="/{{ Config::get('app.locale') }}/prix-tva">{{
                          __('menu.calcul_prix_tva') }}</a></li>
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
      $("button#calculer").click(function (e) {
        e.preventDefault();
        // var taux_tva = parseFloat($('#taux_tva').val());
        // console.log('taux_tva !!!!', taux_tva)

        // var valeur_tva = taux_tva / 100;

        
        // console.log('valeur_tva !!!!', valeur_tva)
        var valeur_ttc = parseFloat($('#prix_ttc').val());
        console.log('valeur_ttc !!!!', valeur_ttc)

        var valeur_ht = parseFloat($('#prix_ht').val());
        console.log('valeur_ht !!!!', valeur_ht)

        if(valeur_ttc>=valeur_ht){
          var resultat_tva_valeur = (valeur_ttc-valeur_ht)/valeur_ht;
          // console.log('bouton clicked !!!!', resultat_ttc)

          var resultat_ttc_check = valeur_ht*resultat_tva_valeur+valeur_ht;
          console.log('resultat_ttc_check : '+resultat_ttc_check);
          if(resultat_ttc_check!=valeur_ttc){
            $('#taux_tva').val('Erreur');
          }
          else{
            $('#taux_tva').val(resultat_tva_valeur*100);
          }
        }
        else{
          $('#taux_tva').val('{{ __("prix_ttc_ht.prix_ht_inf_prix_ttc") }}');
        }
      });
    </script>
    <!-- Footer -->
    @include('globals.footer')