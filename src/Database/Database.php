<?php

namespace Task\Database;

interface Database
{
    public function connect();
    public function query($query);
    public function fetchArray($result);
    public function fetchAssoc($result);

}