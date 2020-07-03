<?php
/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class RequestController extends Controller
{

    public function __construct()
    {
        session_start();
    }


    public function handle()
    {
        Router::get('', 'BikeController@index');
        Router::get('register', 'UserController@register');
        Router::post('register', 'UserController@createUser');
        Router::get('login', 'UserController@login');
        Router::post('login', 'UserController@loginCheck');
        Router::get('logout', 'UserController@logout');

        Router::get('welcome', 'PageController@welcome');
        Router::get('about', 'PageController@about');

        http_response_code(404);
        $this->view('errors/404');
    }
}