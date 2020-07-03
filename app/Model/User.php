<?php

/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class User extends ValidationLogic
{
    private $dataHandler;

    public function __construct()
    {
        $this->dataHandler = new DataHandler();
    }

    public function create($request)
    {
        $result = $this->validate($request, ['name', 'email', 'password']);

        if ($result['success']) {
            $query = "INSERT INTO users (name, email, password)";
            $query .= "VALUES(:name, :email, :password)";

            $request['password'] = Tools::encrypt($request['password']);

            $result = $this->dataHandler->query($query, $request, true);

            //if user is created
            if ($result) {
                RequestHandler::redirect('login');
                return;
            }

            $result['errors']['registered'] = "Kon geen account aanmaken, probeer het later opnieuw. ";


        }

        return $result;
    }

}