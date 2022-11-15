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
                                <h1 class="title text-white">{{ __('holidays.titre') }} {{ $annee }}</h1>
                                <ol class="breadcrumb text-left text-black mt-10">
                                    <li><a href="/">{{ __('menu.accueil') }}</a></li>
                                    <!-- <li><a href="#">Pages</a></li> -->
                                    <li class="active text-gray-silver">{{ __('holidays.titre') }} {{ $annee }}</li>
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
                                <h3 class="text-theme-colored line-bottom text-theme-colored">{{ __('holidays.titre')
                                    }} {{ $annee }}</h3>
                                <!-- contenu de la page : Début -->

                                <!-- contenu de la page : Fin -->

                            </div>
                        </div>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="small">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-center font-16 font-weight-600 bg-theme-colored2 text-white"
                                                colspan="4">{{ str_replace('[annee]',$annee,__('holidays.titre_tableau'))  }} </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('holidays.vacance') }}</th>
                                            <th>{{ __('holidays.date') }}</th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        @foreach ($holidays as $holiday)
                                            <tr>
                                                <th scope="row">{{ $holiday->nom }}</th>
                                                <td>{{ $holiday->date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                var chiffre = parseFloat($('#chiffre').val());


                var resultat = parseInt(chiffre, 2);

                // console.log('bouton clicked !!!!', resultat_ttc)
                $('#resultat').val(resultat);

            });
        </script>
        <!-- Footer -->
        @include('globals.footer')