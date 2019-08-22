<?php
declare (strict_types=1);
namespace feature\src\dataAccess;
use mysqli;
use Exception;

class DataManager
{
    const DB_RK_ACTIVITY = "rk_activity";
    const LOC_MASTER = "master";

    private $result;
    public function __construct()
    {
        $this->db = mysqli_connect("localhost", "root", "password123!@#PASSWORD", "rk_activity");
    }

    public function query($query) {
        $this->result = mysqli_query($this->db, $query);
    }

    public function fetchAll() {
        return mysqli_fetch_all ($this->result, MYSQLI_ASSOC);
    }

    public function fetch() {
        return mysqli_fetch_assoc ($this->result);
    }



}