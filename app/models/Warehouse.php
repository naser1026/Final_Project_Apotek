<?php 

class Warehouse {
    private $tabel = "tbl_m_warehouse";
    private $db;
    public function __construct() {
        $this->db = new Database();
    }

    public function getAllWarehouse() {
        $this->db->query("SELECT * FROM " .$this->tabel);
        return $this->db->resultSet();
    }

}