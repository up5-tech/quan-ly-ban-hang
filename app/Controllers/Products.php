<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Products extends Controller
{
    public function index()
    {
        echo 'index product ';

    }

    public function insert_product()
    {
        echo view('insert_product');
        $data =
            [
                'product_name' => $_POST['name'],
                'quantity' => $_POST['quantity'],
                'cost_import' => $_POST['price_import'],
                'cost_export' => $_POST['price_export'],
                'note' => $_POST['note']
            ];
        print_r($data);
    }


    public function show_all_product()
    {
        echo 'show all product';
    }

}