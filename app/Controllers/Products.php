<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;


class Products extends Controller
{
    public function index()
    {
        $show_product = $this->show_all_product();
    }

    public function insert_product()
    {
        echo view('insert_product');
    }

    public function show_all_product()
    {
        $model = new ProductModel();
        $builder = $model->setTable('products')->select('name');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function add_to_db()
    {

        $model = new ProductModel();
        $data =
            [
                'name' => $_POST['name'],
                'quantity' => $_POST['quantity'],
                'price_import' => $_POST['price_import'],
                'price_export' => $_POST['price_export'],
                'note' => $_POST['note'],
                'image_name' => $_POST['name_img']
            ];

        $ck = $this->check_insert_product($data['name']);
        if ($ck == 0) {
            //insert
            $model->insert($data);
            $this->insert_product();
        }

    }

    public function check_insert_product($data)
    {
        $model = new ProductModel();
        $all_product = $model->setTable('products')->where('name=', $data);
        $query = $all_product->get()->getResultArray();

        if ($query == null) {
            return 0;
        } else {
            return 1;
        }

    }
}