<?php

namespace Task\Database;

class Mysql
{
    private  $link;

    public function connect($server='', $username='', $password='', $database)
    {
        $this->link = mysqli_connect($server, $username, $password, $database);
    }

    public function query($query)
    {
        return mysqli_query($this->link, $query);
    }

    public function fetchArray($result, $array_type = MYSQLI_BOTH)
    {
        return mysqli_fetch_array($result, $array_type);
    }

    public function fetchAssoc($result)
    {
        return mysqli_fetch_assoc($result);
    }
}
