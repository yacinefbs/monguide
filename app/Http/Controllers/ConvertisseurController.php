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
        
        $this->seo()->setTitle(__('convertisseurs.titre_bin_dec'));
        $this->seo()->setDescription(__('convertisseurs.titre_bin_dec'));
        $this->seo()->setDescription(__('convertisseurs.titre_bin_dec'));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');


        return view('convertisseurs.bindec', []);
    }
    
}
