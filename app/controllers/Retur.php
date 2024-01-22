<?php

class Retur extends Controller
{
    public function index() {
        $data['title'] = "Havie Farma | Retur Produk";
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        if ($data['purchase'] = $this->model('Purchase_model')->getAllPurchase()) {
        }else {
            $data['purchase'] = [];
        }
        $this->view('templates/header', $data);
        $this->view('retur/index', $data);
        $this->view('templates/footer', $data);
        
    }
    
    public function product_retur($id = null) 
    {
        if (!empty($_POST)) {
            unset($_SESSION['id_purchase']);
            unset($_SESSION['list_product_retur']);
            unset($_SESSION['id']);
            $_SESSION['id_purchase'] = $_POST['id_purchase'];
        }
        $data['title'] = "Havie Farma | Retur Produk";
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $data['purchase_detail'] = $this->model('Purchase_model')->getPurchaseById($_SESSION['id_purchase']);
        $data['purchase'] = $this->model('Purchase_model')->getAllPurchase();
        $data['list_product'] = $this->model('Product')->getProductDetail($data['purchase_detail']['list_id_product_ttp'], $data['purchase_detail']['list_qty_ttp']); 
        $this->view('templates/header', $data);
        $this->view('retur/detail', $data);
        $this->view('templates/footer', $data); 
    }

    public function addRetur() 
    {

        if ($this->model('Retur_model')->addRetur($_POST) > 0) {
            $this->model('Product')->updateStock($_POST['list_product'],$_POST['list_qty']);
            $this->model('Purchase_model')->updatePurchase($_POST['id_purchase'],$_POST['list_product'],$_POST['list_qty'], $_POST['retur_price']);
            Util::setFlash('Transaksi retur produk <strong>berhasil</strong>','success');
            header('Location: '.BASEURL.'retur/index');
            exit;
        }else {
            Util::setFlash('Transaksi retur produk <strong>gagak</strong>','danger');
            header('Location: '.BASEURL.'retur/index');
            exit;
        }
    }
}