<?php

class Home extends Controller
{

    public function index()
    {

        $data['title'] = "Havie Farma | Dashboard";
        $data['todaySales'] = $this->model('Cashier_model')->getTodaySales();
        $data['todayRetur'] = $this->model('Retur_model')->getTodayRetur();
        $data['total_purchase'] = $this->model('Purchase_model')->getTodayCountPurchase();
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');

    }

    public function login()
    {
        $this->view('home/login');
    }

    public function validateLogin()
    {
        if ($user = $this->model("User_model")->getUser($_POST['email'], $_POST['password'])) {
            header('Location: '.BASEURL.'home/index');
            exit;
        }else {
            Util::setFlash('Login gagal '.$_SESSION['login_error'], 'danger');
            unset($_SESSION['login_error']);
            header('Location: '.BASEURL.'home/login');
            exit;   
        }
    }
    
    public function logout()
    {
        $this->model('User_model')->userLogout();
        $this->view('home/login');
    }
    
    public function myProfile($id) 
    {
        $data['title'] = "Havie Farma | My Profile";
        $data['user'] = $this->model('User_model')->getUserById($id);
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        $this->view('templates/header', $data);
        $this->view('home/myprofile', $data);
        $this->view('templates/footer');
    }
    
    
}