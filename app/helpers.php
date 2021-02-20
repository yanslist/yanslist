<?php

use SimpleSoftwareIO\QrCode\Facades\QrCode;

if (!function_exists('makeToken')) {

    /**
     * Generate alphanumeric token.
     *
     * @param  int  $length  (Outcome will be 2 times the number provided.)
     * @return string
     * @throws Exception
     */
    function makeToken($length = 4): string
    {
        $bytes = random_bytes($length);
        $token = bin2hex($bytes);
        return $token;
    }
}

if (!function_exists('flashMsg')) {

    /**
     * Create flash session to use for alert and noti.
     *
     * @param  string  $type  (primary, info, success, danger)
     * @param  string  $msg
     * @return string[]
     */
    function flashMsg(string $type = 'primary', string $msg = 'Successfully submitted.'): array
    {
        return ['type' => $type, 'message' => $msg];
    }
}

if (!function_exists('saveQrcode')) {
    /**
     * Generate a qrcode as png and save in storage
     * Return filename
     *
     * @param  string  $url
     * @param  string  $code
     * @return string
     */
    function saveQrcode(string $url, string $code): string
    {
        $filename = $code.'.png';
        QrCode::size(300)
            ->gradient(29, 29, 80, 141, 131, 237, 'radial')
            ->format('png')
            ->generate($url, storage_path('app/public/qrcodes/'.$filename));

        return $filename;
    }
}

if (!function_exists('captcha')) {
    /**
     * Submit recaptcha to google api.
     *
     * @param  String  $token
     * @return array|mixed
     */
    function captcha(string $token)
    {
        $response = Http::asForm()->post(config('services.recaptcha.domain'), [
            'secret' => config('services.recaptcha.secret'),
            'response' => $token,
        ]);

        return $response->json();
    }
}

if (!function_exists('shortenUrl')) {
    /**
     * Shorten url using Polr API
     *
     * @param  string  $url
     * @param  string  $code
     * @return string
     */
    function shortenUrl(string $url, string $code): string
    {
        $endpoint = config('services.polr.domain').'/api/v2/action/shorten';
        $response = Http::post($endpoint, [
            'key' => config('services.polr.key'),
            'url' => $url,
            'custom_ending' => $code,
        ]);
        return $response->body();
    }
}
