<?php

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
        return bin2hex($bytes);
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
