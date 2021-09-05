<?php

class Report extends Database
{
    var $db;
    public function __construct()
    {
        $database = new Database;
        if (!isset($database->config)) exit('Config not found');
        $database->connection($database->config);
        $this->db = $database->db;
    }

    public function getReport()
    {
        $query = $this->db->prepare('SELECT * FROM `data`');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
