<?php
class User extends Controller
{

    public function index()
    {
        $data['title'] = "Apotek Havie | Master User";
        $data['users'] = $this->model('User_model')->getAllUser();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        if ($_SESSION["role"] != 'OWNER') {
            header("Location:" . BASEURL . "home/index");
        }
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');

    }
    public function addUser() {
        if($this->model('User_model')->addUser($_POST,$_FILES) > 0)
        {
            Util::setFlash('User <strong>berhasil</strong> ditambahakan', 'success');
            header("Location:" . BASEURL . "user/index"); 
        }else {
            Util::setFlash('User <strong>gagal</strong> dihapus', 'denger');
            header("Location:" . BASEURL . "user/index");   
        }
    }

    public function detail($id)
    {
        $data['title'] = "Apotek Havie | Master User";
        if ($_SESSION["role"] != 'OWNER') {
            header("Location:" . BASEURL . "home/index");
        }
        $data['user'] = $this->model('User_model')->getUserById($id);
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $this->view('templates/header', $data);
        $this->view('user/detail', $data);
        $this->view('templates/footer');
    }

    public function user_edit()
    {
        if ($this->model('User_model')->editUser($_POST, $_FILES) > 0) {
            Util::setFlash('Data user <strong>berhasil</strong> diubah', 'success');
            header("Location:" . BASEURL . "user/detail/{$_POST['id']}");
        }else {
            Util::setFlash('Data user <strong>gagal</strong> diubah', 'danger');
            header("Location:" . BASEURL . "user/index");
        }
    }
    public function user_delete($id)
    {
        if ($this->model('User_model')->deleteUserById($id) > 0) {
            Util::setFlash('Data user <strong>berhasil</strong> dihapus', 'success');
            header("Location:" . BASEURL . "user/index");
        }else {
            Util::setFlash('Data user <strong>gagal</strong> dihapus', 'danger');
            header("Location:" . BASEURL . "user/index");
        }
    }
    public function update_profile()
    {
        if($this->model('User_model')->update_profile($_POST, $_FILES) > 0)
        {
            Util::setFlash('Data user <strong>berhasil</strong> diupdate', 'success');
            header("Location: ".BASEURL."home/myProfile/".$_POST['id']);
            exit;
        }
        Util::setFlash('Data user <strong>gagal</strong> diupdate, '.$_SESSION['error_massage'], 'danger');
        header("Location: ".BASEURL."home/myProfile/".$_POST['id']);
        unset($_SESSION['error_massage']);
        exit;
    }

}
