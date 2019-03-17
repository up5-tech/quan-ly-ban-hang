<?php
namespace App\Controllers;
use App\Models\BillModel;
use CodeIgniter\Controller;
class Bills extends Controller
{
    public function index()
    {
        $count_bill=$this->count_bill();
    }

    public function count_bill()
    {
        $model=new BillModel();
        $count=$model->countAll();
        return $count;
    }
}