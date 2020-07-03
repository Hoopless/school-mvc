<?php
/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class UserController extends Controller
{


    public function register()
    {
        $this->view('register');
    }

    public function createUser()
    {
        $user = new User();
        $data = $user->create($_POST);

        $this->view('register', $data);
    }

    public function login()
    {
        if (Auth::check()) {
            RequestHandler::redirect('welcome');
        }

        $this->view('login');
    }

    public function loginCheck()
    {
        $auth = new Auth;
        $data = $auth->attempt($_POST);

        $this->view('login', $data);
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();

        RequestHandler::redirect('');
    }
}