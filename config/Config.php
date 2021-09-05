<?php

class Config
{
    public function url($path = null)
    {
        $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $base_url .= "://" . $_SERVER['HTTP_HOST'];
        $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        if ($path) return $base_url . $path;
        else return $base_url;
    }

    public function session()
    {
        session_start();
        if (!isset($_SESSION['login'])) return header('Location: ' . $this->url('login'));
    }
}
