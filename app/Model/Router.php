<?php

/**
 * This class is to handle the requests.
 * It does Check if the routes are valid to handle the request.
 * If the method is correct and if the url is correct.
 *
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */


class Router
{

    /**
     * Trims the URL correctly and removes the get parameters from URL.
     *
     * @param string $url
     * @return mixed|string
     */
    public static function setURLCorrect($url)
    {
        $root_url    = str_replace(URLROOT, "", $url);
        $trimmed_url = trim($root_url, '/');
        $url         = explode('?', $trimmed_url, 2);


        return $url[0];
    }

    /**
     *  This function is called when there is a get method being used.
     *  It checks if the url is an valid get and if the url matches the requested url and redirect them correctly if so.
     *
     * @param string $request
     * @param string $function_model
     */
    public static function get($request, $function_model)
    {
        $url = self::setURLCorrect($_SERVER['REQUEST_URI']);

        $function_model = explode('@', $function_model);
        $class          = $function_model[0];
        $method         = $function_model[1];
        $file           = APPROOT . "/Controller/" . $class . ".php";

        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            if ($url === $request) {
                if (file_exists($file)) {
                    require_once $file;
                    $myobject = new $class();
                    $myobject->$method();
                    die();
                } else {
                    die("File {$file} not found.");
                }
            }
        }

    }

    public static function post($request, $function_model)
    {
        $url = self::setURLCorrect($_SERVER['REQUEST_URI']);

        $function_model = explode('@', $function_model);
        $class          = $function_model[0];
        $method         = $function_model[1];
        $file           = APPROOT . "/Controller/" . $class . ".php";

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ($url === $request) {
                if (file_exists($file)) {
                    require_once $file;
                    $myobject = new $class();
                    $myobject->$method();
                    die();
                } else {
                    die("File/Class {$file} not found.");
                }
            }
        }

    }
}