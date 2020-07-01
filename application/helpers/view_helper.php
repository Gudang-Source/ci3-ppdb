<?php

use Jenssegers\Blade\Blade;

if(!function_exists('view')) {
    function view($view, $data = [], $dir)
    {
        $path = VIEWPATH . $dir;
        $blade = new Blade($path, $path . '/cache');

        echo $blade->make($view, $data);
    }

    function redirectTo($url, $dir)
    {
        $path = VIEWPATH . $dir;
        $blade = new Blade($path, $path . '/cache');

        echo $blade->make($url);
    }
}

?>