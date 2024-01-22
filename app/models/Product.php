<?php

class Product
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function getAllProduct()
    {
        $this->db->query("SELECT id_product_tmp,small_barcode_tmp, large_barcode_tmp, name_tmp, name_tmf, name_tms, name_tmun,large_price_tmp,small_price_tmp, fill_tmp, stock_tmp FROM tbl_m_product JOIN tbl_m_factory ON tbl_m_product.id_factory_tmp = id_factory_tmf JOIN tbl_m_suplier ON tbl_m_product.id_suplier_tmp = id_suplier_tms JOIN tbl_m_unit ON tbl_m_product.id_small_unit_tmp = id_unit_tmun ");

        return $this->db->resultSet();

    }
    public function getProductById($id)
    {
        $this->db->query("SELECT * FROM tbl_m_product WHERE id_product_tmp = '$id'");
        return $this->db->single();

    }

    public function addProduct($post)
    {

        $query = "INSERT INTO tbl_m_product(large_barcode_tmp,small_barcode_tmp, name_tmp, id_large_unit_tmp, id_small_unit_tmp, fill_tmp, large_price_tmp,small_price_tmp, id_suplier_tmp, id_factory_tmp, date_added_tmp, added_by_tmp) 
                    VALUES (:large_barcode,
                            :small_barcode,
                            :name,
                            :large_unit,
                            :small_unit,
                            :fill,
                            :large_price,
                            :small_price,
                            :suplier,
                            :factory,
                            :date_time,
                            :add_by)";

        $this->db->query($query);
        $this->db->bind('large_barcode', $post['large_barcode']);
        $this->db->bind('small_barcode', $post['small_barcode']);
        $this->db->bind('name', $post['name']);
        $this->db->bind('large_unit', $post['large_unit']);
        $this->db->bind('small_unit', $post['small_unit']);
        $this->db->bind('large_price', $post['large_price']);
        $this->db->bind('small_price', $post['small_price']);
        $this->db->bind('suplier', $post['suplier']);
        $this->db->bind('fill', $post['fill']);
        $this->db->bind('date_time', Util::date());
        $this->db->bind('factory', $post['factory']);
        $this->db->bind('add_by', $_SESSION['name']);
        $this->db->execute();

        return $this->db->rowCount();

    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM tbl_m_product WHERE id_product_tmp = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();


        return $this->db->rowCount();
    }


    public function updateProduct($post)
    {
       
        $query = "UPDATE tbl_m_product SET
                name_tmp = :name, 
                large_barcode_tmp = :large_barcode,
                small_barcode_tmp = :small_barcode,
                id_factory_tmp = :factory,
                id_suplier_tmp = :suplier,
                fill_tmp = :fill,
                id_large_unit_tmp = :large_unit,
                id_small_unit_tmp = :small_unit,
                small_price_tmp = :small_price,
                large_price_tmp = :large_price,
                update_date_tmp = :date_time,
                update_by_tmp = :update_by
                WHERE id_product_tmp = :id";

        $this->db->query($query);

        $this->db->bind('id', $post['id']);
        $this->db->bind('name', $post['name']);
        $this->db->bind('large_barcode', $post['large_barcode']);
        $this->db->bind('small_barcode', $post['small_barcode']);
        $this->db->bind('factory', $post['factory']);
        $this->db->bind('suplier', $post['suplier']);
        $this->db->bind('large_unit', $post['large_unit']);
        $this->db->bind('small_unit', $post['small_unit']);
        $this->db->bind('small_price', $post['small_price']);
        $this->db->bind('large_price', $post['large_price']);
        $date_time = Util::date();
        $this->db->bind('date_time', $date_time);
        $this->db->bind('fill', $post['fill']);
        $this->db->bind('update_by', $_SESSION['name']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateStock($list_id, $list_qty, $unit = 0)
    {
        $list_id = explode(',', $list_id);
        $list_qty = explode(',', $list_qty);
        $counter = count($list_id);
        
        for ($i = 0; $i < $counter; $i++) {
            $id = $list_id[$i];
            $qty = $list_qty[$i];
            $query = "UPDATE tbl_m_product SET stock_tmp = :new_stock WHERE id_product_tmp = :id ";
            $product = $this->getProductById($id);
            $stock = $product["stock_tmp"];
            $fill = $product["fill_tmp"];
            if ($unit == 1){
                $stock = $stock + $qty;
            }else {
                $stock = $stock + ($qty * $fill);
            }
            $this->db->query($query);
            $this->db->bind("id", $id);
            $this->db->bind("new_stock", $stock);
            $this->db->execute();
        }
        return $this->db->rowCount();

    }

    public function updateStockSingle($id, $qty, $unit)
    {


        $product = $this->getProductById($id);
        $stock = $product["stock_tmp"];
        $fill = 1;
        if ($unit == "0") {
            $fill = $product['fill_tmp'];
        }
        $new_stock = $stock + $qty * $fill;

        $query = "UPDATE tbl_m_product SET stock_tmp = :new_stock WHERE id_product_tmp = :id ";
        $this->db->query($query);

        $this->db->bind('id', $id);
        $this->db->bind('new_stock', $new_stock);


        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getProductDetail($list_product_id, $list_qty)
    {
        $list_detail = [];
        $list_product_id = explode(',', $list_product_id);
        $list_qty = explode(',', $list_qty);
        for ($i = 0; $i < count($list_product_id); $i++):
            $product = $this->getProductById($list_product_id[$i]);

            $list_detail[] = [
                'name' => $product['name_tmp'],
                'price' => $product['large_price_tmp'],
                'barcode' => $product['large_barcode_tmp'],
                'qty' => $list_qty[$i],
                'id' => $product['id_product_tmp']
            ];

        endfor;
        return $list_detail;

    }

    public function getEmptyStock()
    {
        $query = "SELECT name_tmp FROM tbl_m_product WHERE stock_tmp = 0";
        $this->db->query($query);

        return $this->db->resultSet();
    }
}
