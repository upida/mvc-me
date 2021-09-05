<?php

class Logout extends Config
{
    public function index()
    {
        session_start();
        $_SESSION['login'] = '';
        unset($_SESSION['login']);
        session_unset();
        session_destroy();
        return header('Location: ' . parent::url('login'));
    }
}
