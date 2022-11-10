<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class SiteController extends Controller
{
    use SEOToolsTrait;
    public function index($locale){

       
        App::setLocale($locale);
        
        $this->seo()->setTitle(__('prix_ht.titre'));
        $this->seo()->setDescription(__('prix_ht.titre'));
        $this->seo()->setDescription(__('prix_ht.titre'));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(__('prix_ht.titre'));
        $this->seo()->jsonLd()->setDescription(__('prix_ht.titre'));
        $this->seo()->jsonLd()->setUrl('https://monguide.net');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));


        return view('site.prixht', []);
    }
    public function prixht($locale){
        
        App::setLocale($locale);

        $this->seo()->setTitle(__('prix_ht.titre'));
        $this->seo()->setDescription(__('prix_ht.titre'));
        $this->seo()->setDescription(__('prix_ht.titre'));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(__('prix_ht.titre'));
        $this->seo()->jsonLd()->setDescription(__('prix_ht.titre'));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/'.$locale.'/prix-ht');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));


        return view('site.prixht', []);
    }
    public function prixttc($locale){
        App::setLocale($locale);
        $this->seo()->setTitle(__('prix_ttc.titre'));
        $this->seo()->setDescription(__('prix_ttc.titre'));
        $this->seo()->setDescription(__('prix_ttc.titre'));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(__('prix_ttc.titre'));
        $this->seo()->jsonLd()->setDescription(__('prix_ttc.titre'));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/'.$locale.'/ttc');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));
        return view('site.prixttc', []);
    }
    public function prixtva($locale){
        App::setLocale($locale);
        $this->seo()->setTitle(__('prix_tva.titre'));
        $this->seo()->setDescription(__('prix_tva.titre'));
        $this->seo()->setDescription(__('prix_tva.titre'));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(__('prix_tva.titre'));
        $this->seo()->jsonLd()->setDescription(__('prix_tva.titre'));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/'.$locale.'/prix-tva');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));
        return view('site.prixtva', []);
    }
  
}
