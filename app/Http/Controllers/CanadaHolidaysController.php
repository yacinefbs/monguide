<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\CanadaProvince;
use App\Models\CanadaHolidays;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CanadaHolidaysController extends Controller
{
    use SEOToolsTrait;
    public function view($locale,$annee,$slug_province,$holidays_lang){
        App::setLocale($locale);


        $province = CanadaProvince::where('slug_en', $slug_province)->orWhere('slug_fr', $slug_province)->first();
        if(empty($province)){
            header('Location: https://monguide.net');
        }
        if($locale=='fr'){
            $province_name = $province->nameFr;
        }
        else{
            $province_name = $province->nameEn;
        }
        $holidays = CanadaHolidays::where('province_id', $province->id)/* ->where('annee', intval($annee)) */->get();

        $this->seo()->setTitle(substr(__('holidays.titre'), 0, 70));
        $this->seo()->setDescription(substr(str_replace('[province]', $province_name, __('holidays.description')), 0, 160));

        
        $this->seo()->opengraph()->setUrl((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('holidays.titre'), 0, 70));
        $this->seo()->jsonLd()->setDescription(substr(str_replace('[province]', $province_name, __('holidays.description')), 0, 160));
        $this->seo()->jsonLd()->setUrl((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        $this->seo()->jsonLd()->setImage(asset('images/logo-monguide-1.png'));

        foreach ($holidays as $key => $holiday) {
            if($locale=='fr'){
                $holidays[$key]->nom = $holiday->nameFr;
            }
            else{
                $holidays[$key]->nom = $holiday->nameEn;
            }
        }

        return view('canadaholidays.view', ['holidays' => $holidays, 'annee' => $annee]);
    }
    
}
