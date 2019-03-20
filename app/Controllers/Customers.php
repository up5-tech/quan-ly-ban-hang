<?php
namespace App\Controllers;
use App\Models\CustomerModel;
use CodeIgniter\Controller;
class Customers extends Controller
{
    public function index()
    {

    }

    public function count_customer() //Đếm số lượng khách khàng
    {
        $model=new CustomerModel();
        $count=$model->countAll();
        return $count;
    }

    public function add_customer()
    {
        $data= [
            'name'=>$_POST['cus_name'],
            'address'=>$_POST['cus_address'],
            'tel'=>$_POST['cus_tel']
        ];

        $model_cus=new CustomerModel();
        $model_cus->insert($data);
        $this->show_add_customer();
    }
    public function show_add_customer()
    {
        echo view('header');
        echo view('add_customer');
    }
}