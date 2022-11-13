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
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

            // echo $response;
        }
    }
}
