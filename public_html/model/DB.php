<?php

class DB
{
    private $db_connect = null;

    function __construct($host, $port, $db_name, $user, $password)
    {
        try {
            $this->db_connect = R::setup("mysql:host=$host;port=$port;dbname=$db_name", $user, $password);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    function __destruct()
    {
        if ($this->db_connect !== null) {
            $this->db_connect = null;
        }
    }
}