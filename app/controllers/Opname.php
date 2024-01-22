<?php 

class Opname extends Controller{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function index() {
        $data['title'] = "Havie Farma | Stok Opname";
        $data["opname"] = $this->model('Opname_model')->getAllOpname();
        $data['product'] = $this->model('Product')->getAllProduct();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();

        $this->view('templates/header', $data);
        $this->view('stockopname/index', $data);
        $this->view('templates/footer' );
    }

    public function updateStock()
    {
        if ($_POST['type'] == 'delete') {
            $_POST['qty'] *=-1;
        }
        if ($this->model('Product')->updateStockSingle($_POST['id'],$_POST['qty'], $_POST['unit']) > 0) {
            Util::setFlash("Stok <strong>berhasil</strong> diubah", "success");
            header("Location: ".BASEURL."opname/index");
            exit;
        }
    }

    public function saveOpname() 
    {
        if($this->model('Opname_model')->addOpname($_POST) > 0) 
        {
            Util::setFlash('Penyesuaian stok <strong>berhasil</strong> di simpan','success');
            header('Location: '.BASEURL.'opname/index');
            exit;
        }else {
            Util::setFlash('Penyesuaian stok <strong>gagal</strong> di simpan','danger');
            header('Location: '.BASEURL.'opname/index');
            exit;
        }
    }

    public function deleteHistory($id)
    {
        if($this->model('Opname_model')->delete($id) > 0) 
        {
            Util::setFlash('Riwayat opname <strong>berhasil</strong> di hapus','success');
            header('Location: '.BASEURL.'opname/index');
            exit;
        }else {
            Util::setFlash('Riwayat opname <strong>gagal</strong> di hapus','danger');
            header('Location: '.BASEURL.'opname/index');
            exit;
        }
    }
  
}