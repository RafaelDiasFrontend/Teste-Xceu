<?php

namespace App\Http\Controllers;

use App\Models\contactModel;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class contactController extends Controller
{
    public function get(Request $req){
        return contactModel::all();
    }
    public function store(Request $req){

        $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'interested_city' => 'required',
            'time_learn' => 'required',
            'investment_value' => 'required',
            'how_know' => 'required',
            'ocupation' => 'required',
            'message' => 'required',
            'captchaIsValid' => 'required',
        ]);

        $params = [
            'secret' 	=> '6Lc2AN0UAAAAABZ9WerBteY27i5bBRjBwGFaIOEE',
            'response' 	=> $req->input('captchaIsValid')
        ];
        $opts = [
            'http' => [
                'method' 	=> 'POST',
                'header' 	=> 'Content-type: application/x-www-form-urlencoded',
                'content' 	=> http_build_query($params)
            ]
        ];
        $context 	= stream_context_create($opts);
        $res 		= file_get_contents('https://www.google.com/recaptcha/api/siteverify',false,$context);
        $res 		= json_decode($res,true);

        if($res['success']) {
            $contact = new contactModel;

            $contact->first_name = $req->input('first_name');
            $contact->last_name = $req->input('last_name');
            $contact->email = $req->input('email');
            $contact->phone = $req->input('phone');
            $contact->city = $req->input('city');
            $contact->state = $req->input('state');
            $contact->interested_city = $req->input('interested_city');
            $contact->time_learn = $req->input('time_learn');
            $contact->investment_value = $req->input('investment_value');
            $contact->how_know = $req->input('how_know');
            $contact->ocupation = $req->input('ocupation');
            $contact->message = $req->input('message');

            if ($contact->save()) {
                return "ok tudo funcionando, Voce é :" . $contact->first_name;
            } else {
                return "Erro no save";
            }
        }
        else {
            return "Deu ruim no captcha";
        }
    }
}
