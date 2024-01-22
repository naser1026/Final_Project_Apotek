<?php

class Purchase_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPurchase()
    {

        $query = "SELECT id_purchase_ttp, invoice_number_ttp, name_tms, invoice_date_ttp, payment_date_ttp, total_payment_ttp, status_ttp, created_by_ttp, created_date_ttp  FROM tbl_t_purchase JOIN tbl_m_suplier ON tbl_t_purchase.id_suplier_ttp = id_suplier_tms";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->resultSet();


    }

    public function addPurchaseList($post)
    {
        try {
            if (!empty($_SESSION['invoice_number'])) {
                if ($post['invoice_number'] != $_SESSION['invoice_number']) {
                    return 0;
                }
            } else {
                $_SESSION['invoice_number'] = $post['invoice_number'];
            }
            if (!empty($_SESSION['invoice_date'])) {
                if ($post['invoice_date'] != $_SESSION['invoice_date']) {
                    return 0;
                }
            } else {
                $_SESSION['invoice_date'] = $post['invoice_date'];
            }
            if (!empty($_SESSION['payment_date'])) {
                if ($post['payment_date'] != $_SESSION['payment_date']) {
                    return 0;
                }
            } else {
                $_SESSION['payment_date'] = $post['payment_date'];
            }
            if (!empty($_SESSION['suplier'])) {
                if ($post['suplier'] != $_SESSION['suplier']) {
                    return 0;
                }
            } else {
                $_SESSION['suplier'] = $post['suplier'];
            }

            $query = "INSERT INTO tbl_t_list_purchase(id_product_ttlp, qty_ttlp)
                    VALUES(:id, :qty)";

            $this->db->query($query);
            $this->db->bind("id", $post["id"]);
            $this->db->bind("qty", $post["qty"]);

            $this->db->execute();

            return $this->db->rowCount();
        }catch (Exception $e) {
            return 0;
        }
    }

    public function getAllListProduct() {
        $query = "SELECT id_list_ttlp, id_product_ttlp, name_tmp, large_price_tmp, qty_ttlp, large_barcode_tmp FROM tbl_t_list_purchase JOIN tbl_m_product ON tbl_t_list_purchase.id_product_ttlp = id_product_tmp";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function deleteLIst($id) 
    {
        $query = "DELETE FROM tbl_t_list_purchase WHERE id_list_ttlp = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function purchase($post) 
    {
        
        $query = "INSERT INTO tbl_t_purchase(invoice_number_ttp, id_suplier_ttp, invoice_date_ttp, payment_date_ttp, total_payment_ttp, created_by_ttp, created_date_ttp, list_qty_ttp, list_id_product_ttp) 
                    VALUES (:invoice_number,:suplier,:invoice_date, :payment_date,:total_payment,:created_by,:created_date, :list_qty, :list_id)";

        $this->db->query($query);
        $this->db->bind("invoice_number", $_SESSION['invoice_number']);
        $this->db->bind('suplier', $_SESSION['suplier']);
        $this->db->bind('invoice_date', $_SESSION['invoice_date']);
        $this->db->bind('payment_date', $_SESSION['payment_date']);
        $total_payment = filter_var($post['total_payment'], FILTER_SANITIZE_NUMBER_INT);
        $this->db->bind('total_payment', $total_payment);
        $this->db->bind('created_by', $_SESSION['name']);
        $created_date = date("Y-m-d H:i:s");
        $this->db->bind("created_date", $created_date);
        $this->db->bind('list_qty', $post['list_qty']);
        $this->db->bind('list_id', $post['list_id']);


        $this->db->execute();
        return $this->db->rowCount();

    }

    public function getPurchaseById($id){
        $query = "SELECT id_purchase_ttp, invoice_number_ttp, name_tms, invoice_date_ttp, status_ttp, payment_date_ttp, total_payment_ttp, list_id_product_ttp, list_qty_ttp  FROM tbl_t_purchase JOIN tbl_m_suplier ON tbl_t_purchase.id_suplier_ttp = id_suplier_tms WHERE id_purchase_ttp = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        return $this->db->single();
    }



    public function updatePurchase($id_purchase, $list_product, $list_qty, $retur_price)
    {
        $data = $this->getPurchaseById($id_purchase);
        var_dump($data);
        $total_payment = $data['total_payment_ttp'];
        $list_product_data = explode(',',$data['list_id_product_ttp']);
        $list_qty_data = explode(',',$data['list_qty_ttp']);
        $list_product = explode(',', $list_product);
        $list_qty = explode(',', $list_qty);
        for ($i = 0; $i < count($list_product); $i++ )
        {
            $index = array_search($list_product[$i], $list_product_data );
            $new_qty = $list_qty_data[$index] + $list_qty[$i];
            unset($list_qty_data[$index]);
            $list_qty_data[$index] = $new_qty;
            if ($new_qty == 0)
            {
                unset($list_product_data[$index]);
                unset($list_qty_data[$index]);
                continue;   
            }
        }
        
        $query = "UPDATE tbl_t_purchase SET list_id_product_ttp = :list_product, list_qty_ttp = :list_qty, total_payment_ttp = :total_payment WHERE id_purchase_ttp = :id_purchase";
        $this->db->query($query);
        $this->db->bind('id_purchase', $id_purchase);
        $this->db->bind('list_product', implode(',', $list_product_data));
        $this->db->bind('list_qty', implode(',', $list_qty_data));
        $this->db->bind('total_payment', $total_payment - filter_var($retur_price, FILTER_SANITIZE_NUMBER_INT));
        $this->db->execute();
        $data = $this->getPurchaseById($id_purchase);
        echo "</br></br></br></br>";
        var_dump($data);
        
        
        
    }
    
    public function getPurchaseByDate($start_date, $end_date)
    {
     
       $query = "SELECT id_purchase_ttp, invoice_number_ttp, name_tms, invoice_date_ttp, status_ttp, payment_date_ttp, total_payment_ttp, list_id_product_ttp, list_qty_ttp, created_by_ttp, created_date_ttp  FROM tbl_t_purchase JOIN tbl_m_suplier ON tbl_t_purchase.id_suplier_ttp = id_suplier_tms WHERE DATE(created_date_ttp) BETWEEN :start_date AND :end_date ";

       $this->db->query($query);
       $this->db->bind('start_date', $start_date);
       $this->db->bind('end_date', $end_date);

       return $this->db->resultSet();
    }
    
    public function getTodayCountPurchase()
    {
        $date = substr(Util::date(), 0, 10);
        $query = "SELECT id_purchase_ttp  FROM tbl_t_purchase JOIN tbl_m_suplier ON tbl_t_purchase.id_suplier_ttp = id_suplier_tms WHERE DATE(created_date_ttp) = :date";

        $this->db->query($query);
        $this->db->bind('date', $date);
        $this->db->execute();
 
        return $this->db->rowCount();
    }


    

}