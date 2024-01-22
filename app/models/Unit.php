<?php 

class Unit {
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function getAllUnit()
    {
        $this->db->query("SELECT * FROM tbl_m_unit" );
        return $this->db->resultSet();

    }

    public function addUnit($post)
    {
        $query = "INSERT INTO tbl_m_unit(name_tmun, information_tmun)
                    VALUES (:name,
                            :information)";

        if (empty($post['information'])) 
        {
            $post['information'] = '-';
        }
        $this->db->query($query);
        $this->db->bind("name", $post["name"]);
        $this->db->bind("information", $post["information"]);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function updateUnit($post)
    {
        $query = "UPDATE tbl_m_unit SET
                    name_tmun = :name,
                    information_tmun = :information 
                    WHERE id_unit_tmun = :id
                    ";
        $this->db->query($query);
        $this->db->bind("id", $post["id"]);
        $this->db->bind("name", $post["name"]);
        $this->db->bind("information", $post["information"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUnitById($id) 
    {
        $query = "SELECT * FROM tbl_m_unit WHERE id_unit_tmun = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        return $this->db->single();

    }

    public function deleteUnit($id) 
    {
        $query = "DELETE FROM tbl_m_unit WHERE id_unit_tmun = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

}
