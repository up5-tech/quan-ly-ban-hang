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
        $count_product=$this->count_product();

    }

    public function insert_product() //display
    {
        echo view('insert_product');
    }
    public function count_product()
    {
        $model=new ProductModel();
        $count=$model->countAll();
        return $count;
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
            $model->delete($id_del, true);
        }
        echo view('insert_product');


        // cần update function thêm => xóa details và bills có id products
    }

    public function add_to_db()
    {
        $model = new ProductModel();
        if($_POST['name_img']==null)
        {
            $name_img='none';
        }else{
            $name_img=time().$_POST['name_img'];
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