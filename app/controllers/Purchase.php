<?php

class Purchase extends Controller
{
    
    public function index()
    {   
        $data["title"] = "Havie Farma | Penerimaan Produk";
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $data['suplier'] = $this->model('Suplier')->getAllSuplier();
        $data['product'] = $this->model('Product')->getAllProduct();
        $data['list_product'] = $this->model('Purchase_model')->getAllListProduct();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view("purchase/index", $data);
        $this->view('templates/footer');
    }
    public function tes()
    {
        $data['title'] = "Havie Farma | Penerimaan Produk";
        $data['purchase'] = $this->model('Purchase_model')->getAllPurchase();
        $data['emptyStock'] = $this->model('Product')->getEmtyStock();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('purchase/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id)
    {
        $data['title'] = "Havie Farma | Penerimaan Produk";
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();

        $data['purchase'] = $this->model('Purchase_model')->getPurchaseById($id);
        $data['list_product'] = $this->model('Product')->getProductDetail($data['purchase']['list_id_product_ttp'], $data['purchase']['list_qty_ttp']); 
        $data['list_product_retur'] = [];
        if ($data['retur'] =$this->model('Retur_model')->getReturById($id)) {
            $data['list_product_retur'] = $this->model('Product')->getProductDetail($data['retur']['list_id_product_ttr'], $data['retur']['list_qty_ttr']); 
        }

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('purchase/detail', $data);
        $this->view('templates/footer');

    }


    public function addToList() 
    {
        if($this->model('Purchase_model')->addPurchaseList($_POST) > 0)
        {
            Util::setFlash('Produk <strong>berhasil</strong> ditambahkan kedalam list','success');
            header('Location: '.BASEURL.'purchase/purchase_form');
            exit;
        }else {
            Util::setFlash('Produk <strong>gagal</strong> ditambahkan kedalam list','danger');
            header('Location: '.BASEURL.'purchase/purchase_form');
            exit;
        }
    }

    public function deleteFromList($id) {
        if($this->model('Purchase_model')->deleteList($id) > 0)
        {
            Util::setFlash('Produk <strong>dikeluarkan</strong> dari list','danger');
            header('Location: '.BASEURL.'purchase/purchase_form');
            exit;
        }
    }

    public function done_purchase() 
    {
    
        if ($this->model('Purchase_model')->purchase($_POST) > 0 )
        {
            $this->model('Product')->updateStock($_POST['list_id'], $_POST['list_qty']);
            Util::setFlash('Transaksi produk <strong>berhasil</strong>','success');
            header('Location: '.BASEURL.'purchase/index');
            exit;
        }else {
            Util::setFlash('Transaksi produk <strong>gagal</strong>','danger');
            header('Location: '.BASEURL.'purchase/index');
            exit;
        }
    }

}