<?php

namespace Model;

class Database
{
    protected function dbconnect()
    {
        $db = new \PDO('mysql:host=db5000544427.hosting-data.io;dbname=dbs522674;charset=utf8', 'dbu514291', 'Je@nforteroche2020', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}
