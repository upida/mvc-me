<?php

class Home extends Config
{
    public $config;

    public function __construct()
    {
        parent::session();
        $this->config = new Config;
    }

    public function index()
    {
        $data = new Report;
        $data = $data->getReport();

        require 'view/home.php';
    }
}
