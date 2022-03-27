<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('slug')) {
    function slug($string, $spaceRepl = "-")
    {
        $string = str_replace("&", "and", $string);
        $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);
        $string = strtolower($string);
        $string = preg_replace("/[ ]+/", " ", $string);
        $string = str_replace(" ", $spaceRepl, $string);
        return $string;
    }
}
