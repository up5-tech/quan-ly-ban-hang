<?php
namespace App\Controllers;
use App\Models\CustomerModel;
use CodeIgniter\Controller;
use App\Models\DetailModel;

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

    public function add_customer()//thêm khách hàng
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
    public function show_add_customer()//hiện thị giao diện thêm khách hàng
    {
        echo view('header');
        echo view('add_customer');
    }

    public function show_all_customer()//giao diện hiển thị tất cả khách hàng
    {
        echo view('header');
        echo view('all_customer');
    }

    public function get_all_customer()
    {
        $model=new CustomerModel();
        $query=$model->setTable('customers')->select('*');
        $data=$query->get()->getResultArray();
        return $data;
    }

    public function delete_cus_detail($id) // xóa id trong details
    {
        $model = new DetailModel();
        $temp = $model->setTable('details')->where('id=', $id);
        if ($temp != null)
        {
            $model->where('id=', $id)->delete($id, true);
        }
    }
}