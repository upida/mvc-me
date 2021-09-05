<?php

class Database
{
    private $database = [
        'production' => [
            'hostname' => 'yourhostname',
            'username' => 'yourusername',
            'password' => 'yourpassword',
            'database' => 'yourdatabase'
        ],
        'development' => [
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'test'
        ]
    ];

    protected $db;
    protected $config;

    protected function __construct()
    {
        $this->config = $this->database['development'];
    }

    protected function connection($db)
    {
        $hostname = isset($db['hostname']) ? $db['hostname'] : '';
        $username = isset($db['username']) ? $db['username'] : '';
        $password = isset($db['password']) ? $db['password'] : '';
        $database = isset($db['database']) ? $db['database'] : '';

        try {
            $this->db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('COnnection failed : ' . $e->getMessage());
        }
    }
}
