<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CanadaProvince;
use App\Models\CanadaHolidays;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class CronCanadaHolidaysController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {
        file_put_contents('logs_access/cron_canada_holidays' . date('Y-m-d_H_i_s.u') . '.txt',  $_SERVER['REMOTE_ADDR']);
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://canada-holidays.p.rapidapi.com/api/v1/provinces?optional=false&year=2023",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: canada-holidays.p.rapidapi.com",
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
            // var_dump($data['provinces']);exit;
            if (empty($data['provinces'])) exit;
            $max_annee = CanadaHolidays::max('annee');
            try {
                foreach ($data['provinces'] as $key => $province) {
                    try {
                        $province_new = CanadaProvince::where('code_province', $province['id'])->first();
                        if (empty($province_new)) {
                            $province_new = new CanadaProvince();
                            $province_new->code_province = $province['id'];
                            $province_new->nameEn = $province['nameEn'];
                            $province_new->nameFr = $province['nameFr'];
                            $province_new->slug_en =  Str::slug($province['nameEn']);
                            $province_new->slug_fr = Str::slug($province['nameFr']);
                            $province_new->sourceLink = $province['sourceLink'];
                            $province_new->sourceEn = $province['sourceEn'];
                        }


                        if ($province_new->save()) {
                            foreach ($province['holidays'] as $key => $holiday) {
                                $holiday_new = new CanadaHolidays();
                                $holiday_new->date = $holiday['date'];
                                $holiday_new->annee = date('Y', strtotime($holiday['date']));
                                $holiday_new->nameEn = $holiday['nameEn'];
                                $holiday_new->nameFr = $holiday['nameFr'];
                                $holiday_new->federal = $holiday['federal'];
                                $holiday_new->observedDate = $holiday['observedDate'];
                                $holiday_new->province_id = $province_new->id;
                                $holiday_new->save();
                            }
                        }
                    } catch (\Exception $e) {
                        //throw $th;
                        echo $e->getMessage();
                    }
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

            // echo $response;
        }
    }

    public function sitemap()
    {
        $provinces = CanadaProvince::get();
        $xml = '<?xml version="1.0" encoding="utf-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
     
        foreach ($provinces as $key => $province) {
            $xml .= '<url>';
            $xml .= '<loc>https://monguide.net/en/canada/holidays/'.$province->slug_en.'/2023</loc>';
            $xml .= '<lastmod>' . date('Y-m-d\TH:i:s+01:00', strtotime($province->created_at)) . '</lastmod>';
            $xml .= '<changefreq>Always</changefreq>';
            $xml .= '<priority>1.0</priority>';
            $xml .= '</url>';

            $xml .= '<url>';
            $xml .= '<loc>https://monguide.net/fr/canada/jours-feries/'.$province->slug_fr.'/2023</loc>';
            $xml .= '<lastmod>' . date('Y-m-d\TH:i:s+01:00', strtotime($province->created_at)) . '</lastmod>';
            $xml .= '<changefreq>Always</changefreq>';
            $xml .= '<priority>1.0</priority>';
            $xml .= '</url>';
        }
        $xml .= '</urlset>';
        if (file_put_contents('sitemaps/holidayscanada.xml', $xml)) {
            echo "\nholidayscanada.xml file created on project root folder.. : ";
        }
    }
}
