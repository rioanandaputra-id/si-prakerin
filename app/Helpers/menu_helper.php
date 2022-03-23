<?php

if (! function_exists('cmenu')) {
    function cmenu($seg)
    {
        if (current_url() == $seg) {
            return 'active';
        } else {
            return '';
        }
    }
}

if (! function_exists('omenu')) {
    function omenu($seg)
    {
        if (strpos($_SERVER['REQUEST_URI'], $seg)) {
            return 'active menu-is-opening menu-open';
        } else {
            return '';
        }
    }
}