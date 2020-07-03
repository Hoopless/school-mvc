<?php
/**
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

class BikeController extends Controller
{
    private $dbh;
    private $bikeModel;

    public function __construct()
    {
        $this->dbh       = new DataHandler();
        $this->bikeModel = new Bike();
    }

    public function index()
    {
        $radius = 80;
        $bikes  = $this->bikeModel->getAllMinRadius($radius);
        $this->view('homepage', ['bikes' => $bikes, 'minRadius' => true, 'radius' => $radius]);
    }
}