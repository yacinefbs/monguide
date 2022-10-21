<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Newsletter;


class NewsletterController extends Controller
{
    public function subscribe(){
        $subscriber = new Newsletter();

        $subscriber->email = $_GET['email'];
        $subscriber->ip_address = $_SERVER['REMOTE_ADDR'];
        $subscriber->host = $_SERVER['REMOTE_ADDR'];

        if($subscriber->save()){
            return ['result' => 'success'];
        }
        else{
            return ['result' => 'error'];
        }

        return view('convertisseurs.bindec', []);
    }
    
}
