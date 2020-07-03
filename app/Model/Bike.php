<?php

/**
 * The Bike Model. The brain to the Bikes and is allowed to calculate and to think
 *
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class Bike
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new DataHandler();
    }

    public function getAllMinRadius($radius)
    {
        $query = "SELECT * FROM bikes WHERE radius > :radius";
        $array = ['radius' => $radius];
        return $this->dbh->readsData($query, $array);
    }


}