<?php

namespace Task\Database;

abstract class Repository
{
    abstract public function all();
    abstract public function find($id);

    private $db;

    public function __construct()
    {
        $this->db = new Mysql();
        $this->db->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    protected function getRows($query)
    {
        $result = $this->db->query($query);
        while ($row = $this->db->fetchAssoc($result)) {
            $list[] = $row;
        }
        return $list;
    }

    protected function getSingleRow($query)
    {
        $result = $this->db->query($query);
        return $this->db->fetchAssoc($result);
    }

    protected function getField($query)
    {
        $result = $this->db->query($query);
        $row = $this->db->fetchArray($result, MYSQLI_BOTH);
        return $row['0'];
    }
}