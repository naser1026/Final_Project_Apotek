<?php 
class Suplier {
    private $db;

    public function __construct() 
    {
        $this->db = new Database();
    }

    public function getAllSuplier() {
        $this->db->query("SELECT * FROM tbl_m_suplier");
        return $this->db->resultSet();
    }

    public function addSuplier($post)
    {
        
        $query = "INSERT INTO tbl_m_suplier(name_tms, address_tms, phone_number_tms, email_tms, website_tms, information_tms) VALUES (:name,:address,:contact,:email,:website,:information)";

        $this->db->query($query);
        $this->db->bind("name", $post["name"]);
        $this->db->bind("address", $post["address"]);
        $this->db->bind("email", $post["email"]);
        $this->db->bind("contact", $post["contact"]);
        $this->db->bind("website", $post["website"]);
        $this->db->bind("information", $post["information"]);

        $this->db->execute();

        return $this->db->rowCount();


                        
    }

    public function getSuplierById($id)
    {
        $query = "SELECT * FROM tbl_m_suplier WHERE id_suplier_tms = :id";

        $this->db->query($query);
        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function updateSuplier($post) 
    {
        $query = "UPDATE tbl_m_suplier SET 
                    name_tms = :name,
                    address_tms = :address,
                    email_tms = :email,
                    phone_number_tms = :contact,
                    information_tms = :information 
                    WHERE id_suplier_tms = :id";

        $this->db->query($query);
        $this->db->bind("id", $post["id"]);
        $this->db->bind("name", $post["name"]);
        $this->db->bind("address", $post["address"]);
        $this->db->bind("email", $post["email"]);
        $this->db->bind("information", $post["information"]);
        $this->db->bind("contact", $post["contact"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSuplier($id)
    {
        $query = "DELETE FROM tbl_m_suplier WHERE id_suplier_tms = :id";

        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}