<?php

use App\Models\Post;
use Illuminate\Support\Facades\Hash;

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
        do {
            $bytes = random_bytes($length);
            $token = bin2hex($bytes);
            $token = Hash::make($token);
        } while (Post::where('token', $token)->first());
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
