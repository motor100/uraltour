<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleCaptcha
{
    protected $validated;

    public function __construct($validated)
    {
        $this->validated = $validated;
    }

    public function get()
    {
        // Google Captcha
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $params = [
            'secret' => config('google.server_key'),
            'response' => $this->validated['recaptcha'],
        ];

        $response = Http::asForm()->post($url, $params);

        return $response->json('success') ? true : false;
    }

}