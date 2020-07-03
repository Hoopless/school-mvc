<?php

/**
 * Core controller
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class Controller
{

    public function view($view,  $data = [])
    {
        // Compose name
        $viewName = APPROOT."/View/" . $view . ".php";
        // Check the view file
        if (file_exists($viewName)) {
            // Require the view to load
            require_once $viewName;
        } else {
            // No view exists
            die("View " . $viewName . " does not exists");
        }
    }
}