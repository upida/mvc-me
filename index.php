<?php

require_once 'vendor/autoload.php';

$config = new Config;

$root = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$url = str_replace($root, '', $_SERVER['REQUEST_URI']);
$path = explode('/', $url);

if (empty($url)) return header("Location: " . $config->url('home')); // set default url

$routes = new Route($path);
