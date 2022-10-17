<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y7QSNZTPJK"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-Y7QSNZTPJK');
  </script>
  <!-- Meta Tags -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="description" content="{{ __('prix_ttc_ht.titre') }}">
  <meta name="keywords" content="prix HT, prix TTC, TVA, VAT, guide">
  <meta name="theme-color" content="blue">
  <meta name="author" content="Mon guide">
  <meta property="og:title" content="{{ __('prix_ttc_ht.titre') }}">
  <meta property="og:description" content="{{ __('prix_ttc_ht.titre') }}">
  <meta property="og:image" content="{{ asset('images/logo-wide.png') }}">
  <meta property="og:url" content="{{url()->current()}}">
  <meta property="og:site_name" content="Mon guide">
  <meta property="og:locale" content="fr_FR">
  <!-- <meta property="og:admins" content="1649061601"> -->
  <!-- <meta property="og:app_id" content="1729332287080675">
<meta property="og:page_id" content="161637767281862"> -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="{{ __('prix_ttc_ht.titre') }}">
  <meta name="twitter:title" content="Mon guide">
  <!-- <meta name="twitter:site" content="@lematinpointma"> -->
  <meta name="twitter:image" content="{{ asset('images/logo-wide.png') }}">
  <!-- <meta name="twitter:creator" content="@lematinpointma"> -->
  <meta name="twitter:language" content="french, fr, francais">
  <meta name="twitter:content-language" content="fr">
  <meta name="twitter:distribution" content="global">
  <meta name="twitter:email" content="contact@monguide.net">
  <meta name="twitter:author" content="Mon guide">
  <meta name="twitter:copyright" content="Mon guide">
  <link href="{{url()->current()}}" rel="canonical">

  <!-- Page Title -->
  <title>EduPlus | Education & Courses HTML5 Template</title>

  <!-- Favicon and Touch Icons -->
  <link href="{{asset('images/favicon.png')}}" rel="shortcut icon" type="image/png">
  <link href="{{asset('images/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="{{asset('images/apple-touch-icon-72x72.png')}}" rel="apple-touch-icon" sizes="72x72">
  <link href="{{asset('images/apple-touch-icon-114x114.png')}}" rel="apple-touch-icon" sizes="114x114">
  <link href="{{asset('images/apple-touch-icon-144x144.png')}}" rel="apple-touch-icon" sizes="144x144">

  <!-- Stylesheet -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/animate.csss')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('css/css-plugin-collections.css')}}" rel="stylesheet" />
  <!-- CSS | menuzord megamenu skins -->
  <link id="menuzord-menu-skins" href="{{asset('css/menuzord-skins/menuzord-boxed.css')}}" rel="stylesheet" />
  <!-- CSS | Main style file -->
  <link href="{{asset('css/style-main.css')}}" rel="stylesheet" type="text/css">
  <!-- CSS | Preloader Styles -->
  <link href="{{asset('css/preloader.css')}}" rel="stylesheet" type="text/css">
  <!-- CSS | Custom Margin Padding Collection -->
  <link href="{{asset('css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
  <!-- CSS | Responsive media queries -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">
  <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
  <!-- <link href="{{asset('css/jquery-ui.min.css')}}css/style.css" rel="stylesheet" type="text/css"> -->

  <!-- CSS | Theme Color -->
  <link href="{{asset('css/colors/theme-skin-color-set1.css')}}" rel="stylesheet" type="text/css">

  <!-- external javascripts -->
  <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- JS | jquery plugin collection for this theme -->
  <script src="{{asset('js/jquery-plugin-collection.js')}}"></script>
  <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{url()->current()}}"
    },
    "headline": "{{ __('prix_ttc_ht.titre') }}",
    "image": {
        "@type": "ImageObject",
        "url": "https://monguide.net/images/logo-wide.png",
        "height": 224,
        "width": 40
    },
    "datePublished": "2022-10-16",
    "dateModified": "2022-10-16",
    "author": {
        "@type": "Person",
        "name": "Mon guide"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Mon guide",
        "logo": {
            "@type": "ImageObject",
            "url": "https://monguide.net/images/logo-wide.png",
            "width": 225,
            "height": 60
        }
    },
    "description": "{{ __('prix_ttc_ht.titre') }}"
}
</script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>