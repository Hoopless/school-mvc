<?php
/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class PageController extends Controller
{
    public function welcome()
    {
        if (! Auth::check()) {
            RequestHandler::redirect('login');
        }

        $this->view('welcome');
    }

    public function about()
    {
        $this->view('about');
    }
}