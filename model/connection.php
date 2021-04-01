<?php

class Connection
{
    public static function Init_connection()
    {
        $host = "localhost";
        $dbname = "project_user";
        $user = "root";
        $password = "";
        $link = new PDO("mysql: host=" . $host . ";dbname=" . $dbname . ";", $user, $password);
        $link->exec("set names utf8");
        return $link;
    }
}
