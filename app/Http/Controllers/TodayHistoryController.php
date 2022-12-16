<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\TodayHistory;


use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class TodayHistoryController extends Controller
{
    use SEOToolsTrait;
 
    public function index($locale){
        App::setLocale($locale);
        
        $this->seo()->setTitle(substr(__('todayhistory.seo_title'), 0, 70));
        $this->seo()->setDescription(substr(__('todayhistory.seo_description'), 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr(__('todayhistory.seo_title'), 0, 70));
        $this->seo()->jsonLd()->setDescription(substr(__('todayhistory.seo_description'), 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/' . $locale . '/today-history');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));

        $today_history = TodayHistory::where('status', 1)->orderby('id', 'desc')->get();
        return view('todayhistory.index', ['todayshistory' => $today_history]);
    }

    public function view($locale, $slug, $id){
        App::setLocale($locale);

        $today_history = TodayHistory::where('status', 1)->where('id', $id)->first();
        $last_today_history = TodayHistory::where('status', 1)->where('code_lang', $locale)->orderby('id', 'desc')->limit(5)->get();
        
        $this->seo()->setTitle(substr($today_history->title, 0, 70));
        $this->seo()->setDescription(substr($today_history->synopsis, 0, 160));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(substr($today_history->title, 0, 70));
        $this->seo()->jsonLd()->setDescription(substr($today_history->synopsis, 0, 160));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/' . $locale . '/today-history/'.$today_history->slug.'/'.$today_history->id);
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));

        return view('todayhistory.view', ['todayhistory' => $today_history, 'lasttodayhistory' => $last_today_history]);
    }
    
}
