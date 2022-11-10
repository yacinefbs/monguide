<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ConvertisseurController;
use App\Http\Controllers\JoursFeriesController;
use App\Http\Controllers\CronTodayHistoryController;
use App\Http\Controllers\TodayHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Crons
$router->get('/cron/today-history', [CronTodayHistoryController::class, 'index']);



$router->group(['prefix' => '/{locale}', 'middleware' => [/* 'token','localization'*/]], function () use ($router) {
    // file_put_contents('logs_access/'.date('Y-m-d_H_i_s.u'). '.txt',  $_SERVER['REMOTE_ADDR']);
    // return $router->get('/prix-ht', ['uses' => 'SiteController@prixht']);
    //Si le visiteurs a saisi une langue n'est pas définit
    $router->get('/', function ($locale) {
        if (! in_array($locale, ['en', 'ar', 'fr', 'es', 'zh', 'it', 'de', 'pt', 'tr','se','ru','hi'])) {
            abort(400);
        }
        // App::setLocale($locale);
        // return view('site.prixht');
    });
    // App::setLocale($locale);
    //Today history
    $router->get('/today-history', [TodayHistoryController::class, 'index']);
    $router->get('/today-history/{slug}/{id}', [TodayHistoryController::class, 'view']);
    
    $router->get('/', [SiteController::class, 'prixht']); //par défaut HT
    $router->get('/prix-ht', [SiteController::class, 'prixht']);
    $router->get('/prix-ttc', [SiteController::class, 'prixttc']);
    $router->get('/prix-tva', [SiteController::class, 'prixtva']);
    $router->get('/binary-decimal', [ConvertisseurController::class, 'bindec']);
    $router->get('/newsletter/subscribe', [NewsletterController::class, 'subscribe']);
    //Jours fériés
    $router->get('/{pays}/{type}/{annee}', [JoursFeriesController::class, 'view']);

    

    /* $router->get('/', function ($locale) {
        if (! in_array($locale, ['en', 'ar', 'fr'])) {
            abort(400);
        }
        App::setLocale($locale);
        return view('site.prixht');
    });
    $router->get('/prix-ht', function ($locale) {
        if (! in_array($locale, ['en', 'ar', 'fr'])) {
            abort(400);
        }
        App::setLocale($locale);
        return view('site.prixht');
    });
    $router->get('/prix-ttc', function ($locale) {
        if (! in_array($locale, ['en', 'ar', 'fr'])) {
            abort(400);
        }
        App::setLocale($locale);
        return view('site.prixttc');
    });
    $router->get('/prix-tva', function ($locale) {
        if (! in_array($locale, ['en', 'ar', 'fr'])) {
            abort(400);
        }
        App::setLocale($locale);
        return view('site.prixtva');
    }); */
});


$router->get('/', function () {
    App::setLocale('fr');
    return view('site.prixht');
});







// Route::get('/{locale}/home', function () {
//     if (! in_array($locale, ['en', 'ar', 'fr'])) {
//         abort(400);
//     }
//     return view('site.accueil');
// });

