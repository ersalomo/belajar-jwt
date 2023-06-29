<?php

if(!function_exists("test_func")) {
    function test_func(): string
    {
        return "test";
    }
}

if(!function_exists("generateRandomInteger")) {
    function generateRandomInteger($length = 16):int
    {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return mt_rand($min, $max);
    }
}
