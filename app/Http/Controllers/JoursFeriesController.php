<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\JoursFeries;
use App\Models\Pays;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class JoursFeriesController extends Controller
{
    use SEOToolsTrait;
    public function view($locale, $pays, $type, $annee){
        App::setLocale($locale);

        $pays_all = Pays::where('pays', $pays)->get();
        // return json_encode($pays);
        $array_pays = [];
        foreach($pays_all as $key => $value){
            $array_pays [$value->pays] = $value->pays_en;
        }
        

        // $array_pays['maroc'] = 'morocco';
        $array_types['jours-feries-civile'] = 1;
        $jours_feries = JoursFeries::where('langue', $locale)
                    ->where('pays', $array_pays[$pays])
                    ->where('annee', $annee)
                    ->where('type', $array_types[$type])
                    ->get();
                    
        foreach ($jours_feries as $key => $jour_ferie) {
            if( $jour_ferie->type == 1){
                $jours_feries[$key]->type_string = 'Jours fériés civils';
            }
            else{
                $jours_feries[$key]->type_string = 'Jours fériés scolaire';
            }
        }

        $this->seo()->setTitle(substr(__('joursferies.titre'), 0, 160));
        $this->seo()->setDescription(substr(str_replace('[pays]', $pays, __('joursferies.description')), 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('joursferies.titre'), 0, 160));
        $this->seo()->jsonLd()->setDescription(substr(str_replace('[pays]', $pays, __('joursferies.description')), 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));

        return view('joursferies.view', ['jours_feries' => $jours_feries, 'annee' => $annee]);
    }
    
}
