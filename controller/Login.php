<?php

class Login extends Config
{
    public $config;

    public function __construct()
    {
        session_start();
        if (isset($_SESSION['login'])) return header('Location: ' . parent::url('home'));

        $this->config = new Config;
    }

    public function index()
    {
        include 'view/login.php';
    }

    public function auth($data)
    {
        if (!$data) {
            include 'view/404.php';
        } else {
            session_start();
            $_SESSION['login'] = true;
            header('Location: ' . parent::url('home'));
        }
    }
}
