<?php
namespace App\Controllers;
use App\Models\CustomerModel;
use CodeIgniter\Controller;
class Customers extends Controller
{
    public function index()
    {
        $count_customer=$this->count_customer();
    }

    public function count_customer()
    {
        $model=new CustomerModel();
        $count=$model->countAll();
        return $count;
    }
}