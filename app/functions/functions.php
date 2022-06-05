<?php

function dd($params = [], $die = true)
{
    print '<pre>';
    print_r($params);
    print '</pre>';

    if ($die) {
        exit();
    }
}
