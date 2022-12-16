<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class SiteController extends Controller
{
    use SEOToolsTrait;
    public function index($locale='en'){
        

       
        App::setLocale($locale);
        
        $this->seo()->setTitle(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_ht.titre'), 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->jsonLd()->setDescription(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));


        return view('site.prixht', []);
    }
    public function prixht($locale){
       if(!empty($_GET['test'])){
      $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "q=Hello%2C%20world!&target=es&source=en",
	CURLOPT_HTTPHEADER => [
		"Accept-Encoding: application/gzip",
		"X-RapidAPI-Host: google-translate1.p.rapidapi.com",
		"X-RapidAPI-Key: tySQn9P3mTmsh6rPVNKzzQOSRVTyp1A98MrjsnBq2BFcBv3zaP",
		"content-type: application/x-www-form-urlencoded"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
        exit;
    }


        App::setLocale($locale);

        $this->seo()->setTitle(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_ht.titre'), 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->jsonLd()->setDescription(substr(__('prix_ht.titre'), 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/'.$locale.'/prix-ht');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));


        return view('site.prixht', []);
    }
    public function prixttc($locale){
        App::setLocale($locale);
        $this->seo()->setTitle(substr(__('prix_ttc.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_ttc.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_ttc.titre'), 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('prix_ttc.titre'), 0, 160));
        $this->seo()->jsonLd()->setDescription(substr(__('prix_ttc.titre'), 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/'.$locale.'/ttc');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));
        return view('site.prixttc', []);
    }
    public function prixtva($locale){
        App::setLocale($locale);
        $this->seo()->setTitle(substr(__('prix_tva.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_tva.titre'), 0, 160));
        $this->seo()->setDescription(substr(__('prix_tva.titre'), 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('prix_tva.titre'), 0, 160));
        $this->seo()->jsonLd()->setDescription(substr(__('prix_tva.titre'), 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/'.$locale.'/prix-tva');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));
        return view('site.prixtva', []);
    }
  
}
