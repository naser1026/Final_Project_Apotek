<?php

class Masterdata extends Controller
{
    // Master Product
    public function masterproduct()
    {
        $data['title'] = "Havie Farma | Master Produk";
        $data['product'] = $this->model('Product')->getAllProduct();
        $data['factory'] = $this->model('Factory')->getAllFactory();
        $data['unit'] = $this->model('Unit')->getAllUnit();
        $data['suplier'] = $this->model('Suplier')->getAllSuplier();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();

        $this->view('templates/header', $data);
        $this->view("masterdata/masterproduct", $data);
        $this->view('templates/footer');
    }


    public function masterproductAdd()
    {
        if ($this->model('Product')->addProduct($_POST) > 0) {
            Util::setFlash('Data produk <strong>berhasil</strong> ditambahkan', 'success');
            header('Location: ' . BASEURL . 'masterdata/masterproduct');
            exit;
        } else {
            Util::setFlash('Data produk <strong>gagal</strong> ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'masterdata/masterproduct');
            exit;
        }

    }

    public function masterproductDelete($id)
    {
        if ($this->model('Product')->deleteProduct($id) > 0) {
            Util::setFlash('Data produk <strong>berhasil</strong> dihapus', 'success');
            header('Location: ' . BASEURL . 'masterdata/masterproduct');
            exit;
        } else {
            Util::setFlash('Data produk <strong>gagal</strong> dihapus', 'danger');
            header('Location: ' . BASEURL . 'masterdata/masterproduct');
            exit;
        }
    }

    public function masterproductUpdate()
    {
        if ($this->model('Product')->updateProduct($_POST) > 0) {
            Util::setFlash('Data produk <strong>berhasil</strong> diubah', 'success');
            header('Location: ' . BASEURL . 'masterdata/masterproduct');
            exit;
        } else {
            Util::setFlash('Data produk <strong>gagal</strong> diubah', 'danger');
            header('Location: ' . BASEURL . 'masterdata/masterproduct');
            exit;
        }
    }

    public function masterproductGetEdit()
    {
        echo json_encode($this->model('Product')->getProductById($_POST['id']));
    }


    // Master Unit
    public function masterunit()
    {
        $data['title'] = "Havie Farma | Master Unit";
        $data['unit'] = $this->model('Unit')->getAllUnit();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $this->view('templates/header', $data);
        $this->view("masterdata/masterunit", $data);
        $this->view('templates/footer');

    }

    public function masterunitAdd()
    {
        if ($this->model('Unit')->addUnit($_POST) > 0) {
            Util::setFlash('Data unit <strong>berhasil</strong> ditambahkan', 'success');
            header('Location: ' . BASEURL . 'masterdata/masterunit');
            exit;
        } else {
            Util::setFlash('Data unit <strong>gagal</strong> ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'masterdata/masterunit');
            exit;
        }
    }


    public function masterunitUpdate()
    {
        if ($this->model('Unit')->updateUnit($_POST) > 0) {

            Util::setFlash('Data unit <strong>berhasil</strong> diubah', 'success');
            header('Location:' . BASEURL . 'masterdata/masterunit');
            exit;
        } else {

            Util::setFlash('Data unit <strong>gagal</strong> diubah', 'danger');
            header('Location:' . BASEURL . 'masterdata/masterunit');
            exit;
        }
    }

    public function masterunitGetEdit()
    {
        echo json_encode($this->model('Unit')->getUnitById($_POST['id']));
    }

    public function masterunitDelete($id)
    {
        if ($this->model('Unit')->deleteUnit($id) > 0) {
            Util::setFlash('Data unit <strong>berhasil</strong> dihapus', 'success');
            header('Location: ' . BASEURL . 'masterdata/masterunit');
            exit;
        } else {
            Util::setFlash('Data unit <strong>gagal</strong> dihapus', 'danger');
            header('Location: ' . BASEURL . 'masterdata/masterunit');
            exit;
        }
    }

    public function masterFactory()
    {
        $data['title'] = "Havie Farma | Master Pabrik";
        $data['factory'] = $this->model('Factory')->getAllFactory();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $this->view('templates/header', $data);
        $this->view("masterdata/masterfactory", $data);
        $this->view('templates/footer');
    }

    public function masterFactoryAdd()
    {
        if ($this->model('Factory')->addFactory($_POST) > 0) {
            Util::setFlash('Data pabrik <strong>berhasil</strong> ditambahkan', 'success');
            header('Location: ' . BASEURL . 'masterdata/masterfactory');
            exit;
        } else {
            Util::setFlash('Data pabrik <strong>gagal</strong> ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'masterdata/masterfactory');
            exit;
        }
    }

    public function masterFactoryUpdate()
    {
        if ($this->model('Factory')->updateFactory($_POST) > 0) {

            Util::setFlash('Data pabrik <strong>berhasil</strong> diubah', 'success');
            header('Location:' . BASEURL . 'masterdata/masterfactory');
            exit;
        } else {

            Util::setFlash('Data pabrik <strong>gagal</strong> diubah', 'danger');
            header('Location:' . BASEURL . 'masterdata/masterfactory');
            exit;
        }
    }

    public function masterFactoryGetEdit()
    {
        echo json_encode($this->model('Factory')->getFactoryById($_POST['id']));
    }

    public function masterfactoryDelete($id)
    {
        if ($this->model('Factory')->deleteFactory($id) > 0) {
            Util::setFlash('Data pabrik <strong>berhasil</strong> dihapus', 'success');
            header('Location: ' . BASEURL . 'masterdata/masterfactory');
            exit;
        } else {
            Util::setFlash('Data pabrik <strong>gagal</strong> dihapus', 'danger');
            header('Location: ' . BASEURL . 'masterdata/masterfactory');
            exit;
        }
    }

    public function mastersuplier() 
    {
        $data['title'] = "Havie Farma | Master Suplier";
        $data['suplier'] = $this->model('Suplier')->getAllSuplier();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $this->view('templates/header', $data);
        $this->view("masterdata/mastersuplier", $data);
        $this->view('templates/footer');
    }

    public function mastersuplierAdd()
    {
        if ($this->model('Suplier')->addSuplier($_POST) > 0) {
            Util::setFlash('Data suplier <strong>berhasil</strong> ditambahkan', 'success');
            header('Location: ' . BASEURL . 'masterdata/mastersuplier');
            exit;
        } else {
            Util::setFlash('Data suplier <strong>gagal</strong> ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'masterdata/mastersuplier');
            exit;
        }
    }

    public function mastersuplierGetEdit()
    {
        echo json_encode($this->model('Suplier')->getSuplierById($_POST['id']));
    }

    public function mastersuplierUpdate() 
    {
        if ($this->model('Suplier')->updateSuplier($_POST) > 0) {

            Util::setFlash('Data suplier <strong>berhasil</strong> diubah', 'success');
            header('Location:' . BASEURL . 'masterdata/mastersuplier');
            exit;
        } else {

            Util::setFlash('Data suplier <strong>gagal</strong> diubah', 'danger');
            header('Location:' . BASEURL . 'masterdata/mastersuplier');
            exit;
        }
    }

    public function mastersuplierDelete($id)
    {
        if ($this->model('Suplier')->deleteSuplier($id) > 0) {
            Util::setFlash('Data suplier <strong>berhasil</strong> dihapus', 'success');
            header('Location: ' . BASEURL . 'masterdata/mastersuplier');
            exit;
        } else {
            Util::setFlash('Data suplier <strong>gagal</strong> dihapus', 'danger');
            header('Location: ' . BASEURL . 'masterdata/mastersuplier');
            exit;
        }
    }
}

