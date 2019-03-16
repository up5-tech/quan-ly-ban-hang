<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

// insert_product.php = xem-sửa-xóa-thêm data

class Products extends Controller
{
    public function index()
    {
        $show_product = $this->show_all_product();


    }

    public function show_all_product()
    {
        $model = new ProductModel();
        $builder = $model->setTable('products');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function delete_product()
    {
        $id_del = $_GET['id_del'];
        $ck = $this->check_product($id_del, 'id');
        $model = new ProductModel();

        if ($ck != 0) {
            //insert
            $model->delete($id_del, true);
        }
        echo view('insert_product');
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

        $ck = $this->check_product($data['name'], 'name');
        if ($ck == 0) {
            //insert
            $model->insert($data);
        }
        echo view('insert_product');
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
}