<?php
namespace App\Controllers;
use App\Models\OrderModel;
use CodeIgniter\Controller;
class Orders extends Controller
{
    public function index()
    {
    }

    public function count_bill()
    {
        $model=new OrderModel();
        $count=$model->countAll();
        return $count;
    }
}