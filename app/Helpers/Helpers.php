<?php

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return \App\Models\Setting::where('key', $key)->value('value') ?? $default;
    }
}

if (!function_exists('getTranslation')) {
    function getTranslation($text, $locale = null)
    {
        $decoded = json_decode($text, true);

        if (json_last_error() === JSON_ERROR_NONE && (is_array($decoded) || is_object($decoded))) {
            $locale = $locale ?? app()->getLocale();
            $fallbackLocale = $locale === 'en' ? 'ar' : 'en';

            if (!empty($decoded[$locale])) {
                return $decoded[$locale];
            }

            if (!empty($decoded[$fallbackLocale])) {
                return $decoded[$fallbackLocale];
            }
        }

        return $text;
    }
}

