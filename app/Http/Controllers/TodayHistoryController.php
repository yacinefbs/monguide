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
        
        $this->seo()->setTitle(__('todayhistory.seo_title'));
        $this->seo()->setDescription(__('todayhistory.seo_description'));

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle(__('todayhistory.seo_title'));
        $this->seo()->jsonLd()->setDescription(__('todayhistory.seo_description'));
        $this->seo()->jsonLd()->setUrl('https://monguide.net/' . $locale . '/today-history');
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));

        $today_history = TodayHistory::where('status', 1)->get();
        return view('todayhistory.index', ['todayshistory' => $today_history]);
    }

    public function view($locale, $slug, $id){
        App::setLocale($locale);

        $today_history = TodayHistory::where('status', 1)->where('id', $id)->first();
        $last_today_history = TodayHistory::where('status', 1)->where('code_lang', $locale)->orderby('id', 'desc')->limit(5)->get();
        
        $this->seo()->setTitle($today_history->title);
        $this->seo()->setDescription($today_history->synopsis);

        
        $this->seo()->opengraph()->setUrl('https://monguide.net');
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->twitter()->setImage(asset('images/logo-wide.png'));
        
        $this->seo()->setCanonical(url()->current());
        $this->seo()->jsonLd()->setType('Article');
        $this->seo()->jsonLd()->setTitle($today_history->title);
        $this->seo()->jsonLd()->setDescription($today_history->synopsis);
        $this->seo()->jsonLd()->setUrl('https://monguide.net/' . $locale . '/today-history/'.$today_history->slug.'/'.$today_history->id);
        $this->seo()->jsonLd()->setImage(asset('images/logo-wide.png'));

        return view('todayhistory.view', ['todayhistory' => $today_history, 'lasttodayhistory' => $last_today_history]);
    }
    
}
