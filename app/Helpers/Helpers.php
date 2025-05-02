<?php

if (!function_exists('setting')) {
    function setting($key, $default = null): string
    {
        return \App\Models\Setting::where('key', $key)->value('value') ?? $default;
    }
}

if (!function_exists('getTranslation')) {
    function getTranslation($text, $locale = null): string
    {
        $decoded = json_decode($text, true);

        if (json_last_error() === JSON_ERROR_NONE && (is_array($decoded) || is_object($decoded))) {
            $locale         = $locale ?? app()->getLocale();
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

if (!function_exists('getRandomColors')) {
    function getRandomColors(int $count): array
    {
        // Predefined color palette
        $baseColors = [
            '#FF6384', '#36A2EB', '#FFCE56',
            '#4BC0C0', '#9966FF', '#FF9F40',
            '#8A9B0F', '#E74C3C', '#2ECC71',
            '#3498DB', '#9B59B6', '#E67E22',
        ];
        $colors     = [];
        foreach (range(0, $count - 1) as $index) {
            if (isset($baseColors[$index])) {
                $colors[] = $baseColors[$index];
            } else {
                $colors[] = '#' . substr(md5(uniqid((string)$index, true)), 0, 6);
            }
        }

        return $colors;
    }
}
