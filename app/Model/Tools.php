<?php

/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class Tools
{
    public static function encrypt($password)
    {
        $salted = SALTHEADER . $password . SALTTRAILER;
        return hash('ripemd160', $salted);
    }
}