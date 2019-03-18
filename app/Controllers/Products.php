<?php

namespace App\Controllers;

use App\Models\DetailModel;
use App\Models\ProductModel;
use CodeIgniter\Controller;


class Products extends Controller
{
    public function index()
    {
        $show_product = $this->show_all_product();
        $count_product = $this->count_product();
        $edit_product = $this->edit_product();
    }

    public function insert_product() //display
    {
        echo view('insert_product');
    }

    public function count_product()
    {
        $model = new ProductModel();
        $count = $model->countAll();
        return $count;
    }

    public function show_all_product()
    {
        $model = new ProductModel();
        $builder = $model->setTable('products');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function view_data()
    {
        echo view('header');
        echo view('data');
    }

    public function delete_product()
    {

        $id_del = $_GET['id_del'];
        $ck = $this->check_product($id_del, 'id');
        $model = new ProductModel();
        $this->delete_detail($id_del);
        if ($ck == 1) {
            $model->delete($id_del, true);
        }
        echo view('header');
        echo view('data');
    }

    public function delete_detail($product_id) // xóa product trong details
    {
        $model = new DetailModel();
        $temp = $model->setTable('details')->where('product_id=', $product_id);
        if ($temp != null) {
            $data = $temp->get()->getResultArray();
            $id = $data[0]['id'];
            $model->where('product_id=', $product_id)->delete($id, true);
        }
    }


    public function add_to_db()
    {
        if ($_POST['name'] == null) {
            echo view('insert_product');

        } else {

            $model = new ProductModel();
            if ($_POST['name_img'] == null) {
                $name_img = 'none';
            } else {
                $name_img = time() . $_POST['name_img'];
            }
            $data =
                [
                    'name' => $_POST['name'],
                    'quantity' => $_POST['quantity'],
                    'price_import' => $_POST['price_import'],
                    'price_export' => $_POST['price_export'],
                    'note' => $_POST['note'],
                    'image_name' => $name_img
                ];

            $ck = $this->check_product($data['name'], 'name');
            if ($ck == 0) {
                //insert
                $model->insert($data);
            }
            $this->view_data();
        }
    }

    public function check_product($data, $key_to_find)
    {
        $model = new ProductModel();
        $all_product = $model->setTable('products')->where($key_to_find, $data);
        $query = $all_product->get()->getResultArray();

        if ($query == null) {
            return 0;
        } else {
            return 1;
        }
    }

    public function show_edit_product()
    {
        echo view('edit_product');
    }

    public function edit_product()
    {
        $id = $_GET['id_edit'];
        $model = new ProductModel();
        $all_product = $model->setTable('products')->where('id=', $id);
        $query = $all_product->get();
        return $query->getResultArray();
    }

    public function update_product()
    {
        $id = $_GET['edit_id_'];
        $edit_product =
            [
                'id' => $id,
                'name' => $_GET['edit_name'],
                'quantity' => $_GET['edit_quantity'],
                'price_import' => $_GET['edit_price_import'],
                'price_export' => $_GET['edit_price_export'],
                'image_name' => $_GET['edit_img_name'],
                'note' => $_GET['edit_note']
            ];
        $model = new ProductModel();
        $model->update($id, $edit_product);
        $this->view_data();
    }
}