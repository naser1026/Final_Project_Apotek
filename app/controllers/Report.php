<?php 
class Report extends Controller
{
    public function productIn() 
    {
        $data['title'] = "Apotek Havie | Laporan Produk Masuk";
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        if(!empty($_POST)) {
            $data['start_date'] = $_POST['start_date'];
            $data['end_date'] = $_POST['end_date'];
            $data['purchase'] = $this->model('Purchase_model')->getPurchaseByDate($data['start_date'],$data['end_date'] );
        }else {
            $data['purchase'] = $this->model('Purchase_model')->getAllPurchase();
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('report/reportIn', $data);
        $this->view('templates/footer');
    }
    public function profit() 
    {
        $data['title'] = "Apotek Havie | Laporan Produk Keluar";
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        if(!empty($_POST)) {
            $data['start_date'] = $_POST['start_date'];
            $data['end_date'] = $_POST['end_date'];
            $data['sales'] = $this->model('Cashier_model')->getSalesByDate($data['start_date'],$data['end_date'] );
        }else {
            $data['sales'] = $this->model('Cashier_model')->getAllSales();
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('report/reportProfit', $data);
        $this->view('templates/footer');
    }
    public function productOut() 
    {
        $data['title'] = "Apotek Havie | Laporan Produk Keluar";
        $data['emptyStock'] = $this->model('Product')->getEmptyStock();
        if(!empty($_POST)) {
            $data['start_date'] = $_POST['start_date'];
            $data['end_date'] = $_POST['end_date'];
            $data['sales'] = $this->model('Cashier_model')->getSalesByDate($data['start_date'],$data['end_date'] );
        }else {
            $data['sales'] = $this->model('Cashier_model')->getAllSales();
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('report/reportOut', $data);
        $this->view('templates/footer');
    }

}

?>