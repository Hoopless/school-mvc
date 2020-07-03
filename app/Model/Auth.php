<?php

/**
 *  Auth, Handles all Auth logic and talks with the daatabase
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class Auth extends ValidationLogic
{
    private $dataHandler;

    public function __construct()
    {
        $this->dataHandler = new DataHandler();
    }

    /**
     * Tries to login the user or will throw errors if not possible.
     *
     * @param $data
     * @return bool|mixed
     * @throws Exception
     */
    public function attempt($data)
    {
        $result = $this->validate($data, ['email', 'password']);

        if ($result['success']) {
            $query = 'SELECT id, name, email, date_created FROM users ';
            $query .= 'WHERE email = :email ';
            $query .= 'AND password = :password ';

            $password = Tools::encrypt($data['password']);

            $result = $this->dataHandler->query($query, ['email' => $data['email'], 'password' => $password]);
            if ($result) {

                $_SESSION['name']      = $result['name'];
                $_SESSION['email']     = $result['email'];
                $_SESSION['user_id']   = $result['id'];
                $_SESSION['logged_in'] = true;

                RequestHandler::redirect('welcome');

                return;
            }
                $result['errors']['logged_in'] = "Gebruiker niet gevonden. Gegevens correct ingevoerd? ";

        }

        return $result;
    }

    public function logout()
    {
        unset($_SESSION["userid"]);
        unset($_SESSION["useremail"]);
        unset($_SESSION["username"]);
        session_destroy();
    }

    /**
     * Checks if the user is logged in
     */
    public static function check()
    {
        $result = false;
        if (isset($_SESSION['logged_in'])) {
            $result = $_SESSION['logged_in'];
        }

        return $result;
    }

}