<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\OrderModel;
use CodeIgniter\Controller;
use App\Models\Orders_ProductsModel;

class Customers extends Controller
{
    public function index()
    {

    }

    public function count_customer() //Đếm số lượng khách khàng
    {
        $model = new CustomerModel();
        $count = $model->countAll();
        return $count;
    }

    public function add_customer()//thêm khách hàng
    {
        $data = [
            'name' => $_POST['cus_name'],
            'address' => $_POST['cus_address'],
            'tel' => $_POST['cus_tel']
        ];

        $model_cus = new CustomerModel();
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

    public function get_all_customer()//lấy số lượng customers
    {
        $model = new CustomerModel();
        $query = $model->setTable('customers')->select('*');
        $data = $query->get()->getResultArray();
        return $data;
    }

    public function delete_cus_detail($id) // xóa id trong details
    {
        $model = new Orders_ProductsModel();
        $temp = $model->setTable('Orders_ProductsModel')->where('id=', $id);
        if ($temp != null) {
            $model->where('id=', $id)->delete($id, true);
        }
    }

    public function delete_customer()
    {
        $id = $_GET['id_cus_del'];
        $order_model = new OrderModel();
        $data = $order_model->setTable('orders')->where('cus_id=', $id)->get()->getRowArray();
        $order_id = $data['id']; // order_id của cus $id
        $order_product_model = new Orders_ProductsModel();
        $ck = $order_product_model->setTable('orders_products')->where('id=', $order_id)->get()->getRowArray();
        if (isset($ck)) {
            $order_product_model->delete($order_id, true); //xó trong order_product
        }

        $order_model->delete($order_id, true);
        $cus_model = new CustomerModel();
        $cus_model->delete($id, true);
        $this->show_all_customer();
    }

    public function get_customer_edit()
    {
        $id = $_GET['id_cus_edit'];
        $customer_model = new CustomerModel();
        $data = $customer_model->where('id=', $id)->get()->getRowArray();
        return $data;
    }

    public function show_update_customer()
    {
        echo view('header');
        echo view('edit_customer');
    }

    public function update_customer()
    {
        $id = $_GET['cus_id_update'];
        $data =
            [
                'name' => $_GET['cus_name_update'],
                'address' => $_GET['cus_address_update'],
                'tel' => $_GET['cus_tel_update']
            ];

        $model = new CustomerModel();
        $model->update($id, $data);
        $this->show_all_customer();
    }
}