<?php


namespace App\classes;


class Database{
    public static function db()
    {
        $link = mysqli_connect('localhost','root','','beehonest2');
        return $link;
    }
}