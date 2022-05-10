<?php
if (!function_exists('msgg')) {
    function msgg()
    {
        if (session()->getFlashData('success')) {
            return  '<div class="alert alert-success alert-dismissible fade show" role="alert">' . session()->getFlashData('success') .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span></button></div>';
        } 
        
        if (session()->getFlashData('error')) {
            return  '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . session()->getFlashData('error') .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                    </button></div>';
        }
    }
}
