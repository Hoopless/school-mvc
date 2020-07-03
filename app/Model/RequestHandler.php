<?php

/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class RequestHandler
{
    public static function redirect($page)
    {
        header("location: ". DOMAIN . URLROOT ."/{$page}");
    }
}