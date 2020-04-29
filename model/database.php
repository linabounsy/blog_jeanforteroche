<?php

namespace Model;

class Database
{
    protected function dbconnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8', 'root', 'blogcomm@php', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $db;
    }
}