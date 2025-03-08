<?php

if (!function_exists('quaviCss')) {
    function quaviCss(): string
    {
        return '<link rel="stylesheet" href="' . asset('vendor/hen8y/quavi/assets/quavi.css') . '">';
    }
}