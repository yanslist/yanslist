<?php

use App\Models\Post;
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
     * @return string
     * @throws Exception
     */
    function saveQrcode(string $url): string
    {
        do {
            $filename = makeToken(3).'.png';
        } while (Post::where('qrcode', $filename)->first());
        QrCode::size(300)
            ->gradient(29, 29, 80, 141, 131, 237, 'radial')
            ->format('png')
            ->generate($url, storage_path('app/public/qrcodes/'.$filename));

        return $filename;
    }
}
