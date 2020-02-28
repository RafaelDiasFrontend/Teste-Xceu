<?php

namespace App\Rule;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Request;

class ReCaptcha implements Rule
{
    public function validate(
        $value
    ){

        $client = new Client();
        //6Lc2AN0UAAAAAA0_3S-LijRrpD0M1K91wXB3SMKJ    ----   6Lc2AN0UAAAAABZ9WerBteY27i5bBRjBwGFaIOEE
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify?secret=6Lc2AN0UAAAAAA0_3S-LijRrpD0M1K91wXB3SMKJ&response='.$value
        );

        $body = json_decode((string)$response->getBody());
        return $body->success;
    }
}
