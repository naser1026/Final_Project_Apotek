<?php 

class Opname_model {

    private $db;
    public function __construct() 
    {
        $this->db = new Database();
    }

    public function getAllOpname() {
        $query = "SELECT * FROM tbl_m_opname";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function addOpname($post)
    {
        
        $query = "INSERT INTO tbl_m_opname(description_tmo, qty_ok_tmo,qty_up_tmo,qty_down_tmo,created_by_tmo, percentase_tmo, total_difference_price_tmo, created_date_tmo) VALUES(:description, :qty_ok, :qty_up, :qty_down, :created_by, :percentase, :total_difference_price, :created_date)";
        $this->db->query($query);

        $this->db->bind("description", $post["description"]);
        $this->db->bind("qty_ok", $post["sesuai"]);
        $this->db->bind("qty_up", $post["lebih"]);
        $this->db->bind("qty_down", $post["kurang"]);
        $this->db->bind("created_by", $_SESSION["name"]);
        $this->db->bind("percentase", $post["persentase"]);
        $date_time = Util::date();
        $this->db->bind('created_date',$date_time);
        $this->db->bind("total_difference_price", filter_var($post["uang_selisih"],FILTER_SANITIZE_NUMBER_INT));

        $this->db->execute();

        return $this->db->rowCount();

    }
    public function delete($id) 
    {
        $query = "DELETE FROM tbl_m_opname WHERE id_opname_tmo = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}