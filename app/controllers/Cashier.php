<?php

class Cashier extends Controller {
    
    public function index() 
    {
        $data['title'] = "Havie Farma | Kasir";
        $data["product"] = $this->model('Product')->getAllProduct();
        $data['cart'] = $this->model('Cashier_model')->getAllCart();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();

        if (empty($_SESSION['random_number'])){
            $_SESSION['random_number'] = random_int(10000000000000, 99999999999999);
        }
        $data['invoice_number'] = $_SESSION['random_number'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('cashier/index', $data);
        $this->view('templates/footer');
    }

    public function addCart()
    {
        if ($this->model('Cashier_model')->addToCart($_POST) > 0) {
            Util::setFlash('Produk <strong>berhasil</strong> ditambahkan kedalam keranjang', 'success');
            header('Location: ' . BASEURL . 'cashier/index');
            exit;
        }else {
            Util::setFlash('Produk <strong>gagal</strong> ditambahkan kedalam keranjang','danger');
            header('Location: ' . BASEURL . 'cashier/index');
            exit;
        }
    }

    
    public function deleteProductCart($id)
    {
        if($this->model('Cashier_model')->deleteProductFromCart($id)>0)
        {
            Util::setFlash('Produk <strong>dikeluarkan</strong> dari keranjang','danger');
            header('Location: '.BASEURL.'cashier/index');
            exit;
        };
    }
    
    public function payment() {
   
        if ($this->model('Cashier_model')->addPayment($_POST) > 0) 
        {
            unset($_SESSION['random_number']);
            Util::setFlash('Pembayaran <strong>berhasil</strong>','success');
            $this->model('Product')->updateStock($_POST['str_id_list'], $_POST['str_qty_list'], 1);
            header('Location: '.BASEURL.'cashier/index');
        }else {
            Util::setFlash('Pembayaran <strong>gagal</strong>','danger');
            header('Location: '.BASEURL.'cashier/index');
        }
    }
}