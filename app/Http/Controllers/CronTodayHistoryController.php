<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

use App\Models\TodayHistory;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class CronTodayHistoryController extends Controller
{
    use SEOToolsTrait;
 
    public function index(){
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
            if(empty($data['article'])) exit;
            try {
                $today_history = new TodayHistory();
                $today_history->title = $data['article']['title'];
                $today_history->date = $data['article']['date'];
                $today_history->synopsis = $data['article']['synopsis'];
                $today_history->url = $data['article']['url'];
                echo "<br />Inserted : " . $today_history->save();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            
            // echo $response;
        }
    }
    
}
