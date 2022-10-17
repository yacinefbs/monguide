<footer id="footer" class="footer bg-black-111">
    <div class="container pt-70 pb-40">
        <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <img class="mt-10 mb-20" alt="" src="{{ asset('images/logo-wide-white.png') }}">
                    <!-- <p>Lorem ipsum dolor adipisicing amet, consectetur sit elit. Aspernatur incidihil quo officia.</p> -->
                    <ul class="list-inline mt-5">
                        <!-- <li class="m-0 pl-10 pr-10"> <i class="fa fa-map-marker text-theme-colored2 mr-5"></i> <a
                                class="text-gray" href="#">203, Envato Labs, Behind Alis Steet, Melbourne, Australia</a>
                        </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a
                                class="text-gray" href="#">123-456-789</a> </li> -->
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a
                                class="text-gray" href="mailto:<?= env('EMAIL_CONTACT') ?>"><?= env('EMAIL_CONTACT') ?></a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored2 mr-5"></i> <a
                                class="text-gray" href="<?= env('URL_SITE') ?>">monguide.net</a> </li>
                    </ul>
                </div>
                <!-- <div class="widget dark">
                    <h5 class="widget-title mb-10">Connect With Us</h5>
                    <ul class="styled-icons icon-dark mt-20">
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a
                                href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a
                                href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a
                                href="#" data-bg-color="#05A7E3"><i class="fa fa-skype"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a
                                href="#" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
                        <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a
                                href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div> -->
            </div>
            <!-- <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Latest News</h5>
                    <div class="latest-posts">
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="blog-single-right-sidebar.html" class="post-thumb"><img alt=""
                                    src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="blog-single-right-sidebar.html">Sustainable
                                        Construction</a></h5>
                                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="blog-single-right-sidebar.html" class="post-thumb"><img alt=""
                                    src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="blog-single-right-sidebar.html">Industrial
                                        Coatings</a></h5>
                                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="blog-single-right-sidebar.html" class="post-thumb"><img alt=""
                                    src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="blog-single-right-sidebar.html">Storefront
                                        Installations</a></h5>
                                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Call Us Now</h5>
                    <div class="text-gray">
                        +61 3 1234 5678 <br>
                        +12 3 1234 5678
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-sm-6 col-md-3">
                <div class="widget dark mb-20">
                    <h5 class="widget-title line-bottom">Twitter Feed</h5>
                    <div class="twitter-feed list-border clearfix" data-username="Envato" data-count="2"></div>
                </div>
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Useful Links</h5>
                    <ul class="list-border">
                        <li><a href="shortcode-sitemap.html">FAQ</a></li>
                        <li><a href="shortcode-sitemap.html">Sitemap</a></li>
                        <li><a href="page-contact1.html">Policy</a></li>
                    </ul>
                </div>
            </div> -->
            <div class="col-sm-6 col-md-3">
                <!-- <div class="widget dark">
                    <h5 class="widget-title line-bottom">Opening Hours</h5>
                    <div class="opening-hours">
                        <ul class="list-border">
                            <li class="clearfix"> <span> Mon - Tues : </span>
                                <div class="value pull-right flip"> 6.00 am - 10.00 pm </div>
                            </li>
                            <li class="clearfix text-white"> <span> Wednes - Thurs :</span>
                                <div class="value pull-right flip"> 8.00 am - 6.00 pm </div>
                            </li>
                            <li class="clearfix"> <span> Fri : </span>
                                <div class="value pull-right flip"> 3.00 pm - 8.00 pm </div>
                            </li>
                            <li class="clearfix"> <span> Sun : </span>
                                <div class="value pull-right flip"> Closed </div>
                            </li>
                            <li class="clearfix"> <span> Sat : </span>
                                <div class="value pull-right flip"> 10.00 am - 2.00 pm </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Subscribe Us</h5>
                    <!-- Mailchimp Subscription Form Starts Here -->
                    <form id="mailchimp-subscription-form-footer" class="newsletter-form">
                        <div class="input-group">
                            <input type="email" value="" name="EMAIL" placeholder="Your Email"
                                class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer">
                            <span class="input-group-btn">
                                <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14"
                                    type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                    <!-- Mailchimp Subscription Form Validation-->
                    <script type="text/javascript">
                        $('#mailchimp-subscription-form-footer').ajaxChimp({
                            callback: mailChimpCallBack,
                            url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                        });

                        function mailChimpCallBack(resp) {
                            // Hide any previous response text
                            var $mailchimpform = $('#mailchimp-subscription-form-footer'),
                                $response = '';
                            $mailchimpform.children(".alert").remove();
                            if (resp.result === 'success') {
                                $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                            } else if (resp.result === 'error') {
                                $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                            }
                            $mailchimpform.prepend($response);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-black-222">
        <div class="container pt-10 pb-0">
            <div class="row">
                <div class="col-md-6 sm-text-center">
                    <p class="font-13 text-black-777 m-0">Copyright &copy;2015 ThemeMascot. All Rights Reserved</p>
                </div>
                <!-- <div class="col-md-6 text-right flip sm-text-center">
                    <div class="widget no-border m-0">
                        <ul class="styled-icons icon-dark icon-circled icon-sm">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->
<!-- Footer Scripts --> 
<!-- JS | Custom script for all pages --> 
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>