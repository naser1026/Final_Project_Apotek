<?php 

class Factory {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }

    public function getAllFactory() {
        $query = "SELECT * FROM tbl_m_factory";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function addFactory($post) 
    {
        $query = "INSERT INTO tbl_m_factory(name_tmf)
                    VALUES (:name
                    )";

        $this->db->query($query);
        $this->db->bind("name", $post["name"]);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateFactory($post)
    {
        $query = "UPDATE tbl_m_factory SET 
                    name_tmf = :name
                    WHERE id_factory_tmf = :id";

        $this->db->query($query);
        $this->db->bind("name", $post["name"]);
        $this->db->bind("id", $post["id"]);
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function getFactoryById($id)
    {
        $query = "SELECT * FROM tbl_m_factory WHERE id_factory_tmf = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function deleteFactory($id)
    {
        $query = "DELETE FROM tbl_m_factory WHERE id_factory_tmf = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}