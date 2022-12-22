<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TodayHistory;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class CronTodayHistoryController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        file_put_contents('logs_access/cron_today_history' . date('Y-m-d_H_i_s.u') . '.txt',  $_SERVER['REMOTE_ADDR']);
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://today-in-history.p.rapidapi.com/thisday",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: today-in-history.p.rapidapi.com",
                "X-RapidAPI-Key: tySQn9P3mTmsh6rPVNKzzQOSRVTyp1A98MrjsnBq2BFcBv3zaP"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            var_dump($data);
            if (empty($data['article'])) exit;
            try {
                $today_history = new TodayHistory();
                $today_history->title = $data['article']['title'];
                $today_history->date = $data['article']['date'];
                $today_history->synopsis = $data['article']['synopsis'];
                $today_history->url = $data['article']['url'];
                $today_history->slug = Str::slug($data['article']['title']);
                $today_history->updated_at = date('Y-m-d H:i:s');
                echo "<br />Inserted : " . $inserted = $today_history->save();

                if ($inserted) {
                    $this->generetasitemap();
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

            // echo $response;
        }
    }
    
    public function translate($locale){
        if(empty($_GET['test'])){
            exit;
        }
        $todays_historys_translate = TodayHistory::where('translated', 0)->limit(1)->get();
        
        foreach($todays_historys_translate as $key => $today_history_translate){
            $texte_to_translate = ($today_history_translate->title . '$$$$' . $today_history_translate->synopsis . '$$$$' . $today_history_translate->date);
            
            $texte_to_translate = str_replace('“', "'", $texte_to_translate);
            $curl = curl_init();
            
            curl_setopt_array($curl, [
            	CURLOPT_URL => "https://ai-translate.p.rapidapi.com/translates",
            	CURLOPT_RETURNTRANSFER => true,
            	CURLOPT_FOLLOWLOCATION => true,
            	CURLOPT_ENCODING => "",
            	CURLOPT_MAXREDIRS => 10,
            	CURLOPT_TIMEOUT => 30,
            	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            	CURLOPT_CUSTOMREQUEST => "POST",
            	CURLOPT_POSTFIELDS => "{\r
                \"texts\": [\r
                    \"$today_history_translate->title\",\r
                    \"$today_history_translate->synopsis\",\r
                    \"$today_history_translate->date\"\r
                ],\r
                \"tls\": [\r
                    \"ar\",\r
                    \"de\",\r
                    \"es\",\r
                    \"fr\",\r
                    \"hi\",\r
                    \"it\",\r
                    \"pt\",\r
                    \"ru\",\r
                    \"sv\",\r
                    \"tr\",\r
                    \"zh\"\r
                ],\r
                \"sl\": \"en\"\r
            }",
            	CURLOPT_HTTPHEADER => [
            		"X-RapidAPI-Host: ai-translate.p.rapidapi.com",
            		"X-RapidAPI-Key: tySQn9P3mTmsh6rPVNKzzQOSRVTyp1A98MrjsnBq2BFcBv3zaP",
            		"content-type: application/json"
            	],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
            	echo "cURL Error #:" . $err;
            } else {
                // echo $response; exit;
                 $responses = json_decode($response, true);
            // 	var_dump($response);exit;
            	try {
                
            	foreach($responses as $key_resp => $response){
            	    if(!empty($response['texts'])){
            	       // $response_text = explode('$$$$', $response['texts']);
            	    }
            	    else{
            	        var_dump($response);exit;
            	    }
                	$today_history_new = new TodayHistory();
                	$langue = $response['tl'];
                	if($response['tl'] == 'sv'){
                	    $langue = 'se';    
                	}
                	
                // 	if($langue == 'ar'){
                // 	    var_dump($response_text);exit;
                // 	}
            	    $today_history_new->code_lang = $langue;  
                	
                    $today_history_new->title = $response['texts'][0];
                    $today_history_new->date = (!empty($response['texts'][2]) ? $response['texts'][2] : 'none');
                    $today_history_new->synopsis = (!empty($response['texts'][1]) ? $response['texts'][1] : 'none');
                    $today_history_new->slug = ($langue == 'zh') ? $today_history_translate->slug  : Str::slug($response['texts'][0]);
                    $today_history_new->url ='https://monguide.net/'.$langue.'/today-history/'.$today_history_new->slug.'/'.$today_history_new->id;
                    $today_history_new->updated_at = date('Y-m-d H:i:s');
                    $today_history_new->translated = 2;
                    $today_history_new->translated_for = $today_history_translate->id;
                    echo "<br />Inserted : " . $inserted = $today_history_new->save();
    
                    if ($inserted) {
                        $todays_historys = TodayHistory::orderby('id', 'desc')->get();
                        $xml = '<?xml version="1.0" encoding="utf-8"?>';
                        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
                        $xml .= '<url>';
                        $xml .= '<loc>https://monguide.net/en/today-history</loc>';
                        $xml .= '<lastmod>2022-11-11T00:30:00+01:00</lastmod>';
                        $xml .= '<changefreq>Always</changefreq>';
                        $xml .= '<priority>1.0</priority>';
                        $xml .= '</url>';
                        foreach ($todays_historys as $key => $today_history) {
                            $xml .= '<url>';
                            $xml .= '<loc>https://monguide.net/' . $today_history->code_lang . '/today-history/' . $today_history->slug . '/' . $today_history->id . '</loc>';
                            $xml .= '<lastmod>' . date('Y-m-d\TH:i:s+01:00', strtotime($today_history->created_at)) . '</lastmod>';
                            $xml .= '<changefreq>Always</changefreq>';
                            $xml .= '<priority>1.0</priority>';
                            $xml .= '</url>';
                        }
                        $xml .= '</urlset>';
                        if (file_put_contents('sitemaps/todayhistory.xml', $xml)) {
                            echo "\ntodayhistory.xml file created on project root folder.. : ";
                        }
                    }
            	}
            	} catch (\Exception $e) {
            	    $today_history_translate->translated = 9;
            	    $today_history_translate->save();
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                      var_dump($response_text);exit;
                    var_dump($response);
                }
            	
            }
            $today_history_translate->translated = 1;
            $today_history_translate->save();
        }
        $this->generetasitemap();
    }
    
    public function generetasitemap(){
        $todays_historys = TodayHistory::orderby('id', 'desc')->get();
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml .= '<url>';
        $xml .= '<loc>https://monguide.net/en/today-history</loc>';
        $xml .= '<lastmod>2022-11-11T00:30:00+01:00</lastmod>';
        $xml .= '<changefreq>Always</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';
        foreach ($todays_historys as $key => $today_history) {
            $xml .= '<url>';
            $xml .= '<loc>https://monguide.net/' . $today_history->code_lang . '/today-history/' . $today_history->slug . '/' . $today_history->id . '</loc>';
            $xml .= '<lastmod>' . date('Y-m-d\TH:i:s+01:00', strtotime($today_history->created_at)) . '</lastmod>';
            $xml .= '<changefreq>Always</changefreq>';
            $xml .= '<priority>1.0</priority>';
            $xml .= '</url>';
        }
        $xml .= '</urlset>';
        if (file_put_contents('sitemaps/todayhistory.xml', $xml)) {
            echo "\ntodayhistory.xml file created on project root folder.. : ";
        }
    }
}
