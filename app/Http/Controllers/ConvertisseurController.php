<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class ConvertisseurController extends Controller
{
    use SEOToolsTrait;
 
    public function bindec($locale){
        App::setLocale($locale);
        
        $this->seo()->setTitle(substr(__('convertisseurs.titre_bin_dec'), 0, 160));
        $this->seo()->setDescription(substr(__('convertisseurs.titre_bin_dec'), 0, 160));
        $this->seo()->setDescription(substr(__('convertisseurs.titre_bin_dec'), 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('convertisseurs.titre_bin_dec'), 0, 160));
        $this->seo()->jsonLd()->setDescription(substr(__('convertisseurs.titre_bin_dec'), 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/' . $locale . '/binary-decimal');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));


        return view('convertisseurs.bindec', []);
    }
    
}
