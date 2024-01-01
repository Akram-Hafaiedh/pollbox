<?php

namespace App\Helpers;


class CodeHelper
{

    /**
     * Generates an access code.
     *
     * @return string The generated access code.
     */
    public static function generateAccessCode()
    {
        return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    /**
     * Generates a reset password code.
     *
     * @return string The reset password code.
     */
    public static function generateResetPasswordCode()
    {
        return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    /**
     * Generate a verification code.
     *
     * @return string
     */
    public static function generateVerificationCode()
    {
        return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    /**
     * Generates an email verification code.
     *
     * @return string A randomly generated 4-digit code.
     */
    public static function generateEmailVerificationCode()
    {
        return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    /**
     * Parses a YouTube video URL and returns the video ID.
     *
     * @param string $videoUrl The URL of the YouTube video.
     * @return string|null The video ID, or null if it could not be parsed.
     */
    public static function getYoutubeVideoId($videoUrl)
    {
        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
        return isset($params['v']) ? $params['v'] : null;
    }
}
