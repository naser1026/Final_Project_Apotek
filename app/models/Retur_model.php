<?php

class Retur_model
{

    private $db ;
    public function __construct()
    {
        $this->db = New Database();
    }
    public function getListProdukRetur($list_product, $action, $id)
    {

        if(empty($_SESSION['id'])) {
            $_SESSION['id'][] = $id;
        }else{
            if(in_array($id, $_SESSION['id'])){
                return $_SESSION['list_product_retur'];
            }
        }
        if (!is_null($action)) {
            if ($action == 'add') {
                $_SESSION['list_product_retur'][] = $list_product[$id];
                return $_SESSION['list_product_retur'];
            }

        }

    }

    public function addRetur($post) 
    {
        $query = "INSERT INTO tbl_t_retur(id_purchase_ttr, list_id_product_ttr, list_qty_ttr, retur_price_ttr, created_date_ttr)
                    VALUES (:id_purchase, :list_product, :list_qty, :retur_price, :created_date)";


        $this->db->query($query);
        $this->db->bind('id_purchase', $post['id_purchase']);
        $this->db->bind('list_product', $post['list_product']);
        $this->db->bind('list_qty', $post['list_qty']);
        $this->db->bind('retur_price', filter_var($post['retur_price'], FILTER_SANITIZE_NUMBER_INT));
        $this->db->bind('created_date', Util::date());
        $this->db->execute();

        return $this->db->rowCount();
    }


    

    public function getTodayRetur() 
    {
        $date = date("Y-m-d");
        $query = "SELECT retur_price_ttr, created_date_ttr FROM tbl_t_retur WHERE created_date_ttr >= '" . $date . " 00:00:00' AND created_date_ttr <= '" . $date . " 23:59:59'";

        $this->db->query($query);
        $data = $this->db->resultSet();
        $retur = [];
        $count = 0;
       
         foreach ($data as $item) {
            $count+=1;
            $time = date("H:i", strtotime($item["created_date_ttr"]));
            
            if (isset($transaksi[$time])) {
               $retur[$time] += intVal($item["retur_price_ttr"]);
            } else {
               $retur[$time] = intVal($item["retur_price_ttr"]);
            }
        }
         $dataRetur = [
            'retur' => $retur,
            'count' => $count
            ];
    
        return $dataRetur; 
    }

    public function getReturById($id)
    {
        $query = "SELECT * FROM tbl_t_retur WHERE id_purchase_ttr = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->single();
    }

 
}

?>