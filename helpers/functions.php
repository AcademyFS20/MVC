<?php

function debug($vars)
{
    echo "<pre>";
    var_dump($vars);
    echo "</pre>";
    exit;
}

function printArray($var)
{
    echo "<pre>";

    print_r($var);

    echo "</pre>";
    exit;
}







?>