<?php
namespace App\Controllers;
use App\Models\BillModel;
use CodeIgniter\Controller;
class Bills extends Controller
{
    public function index()
    {
        $model = new BillModel();
        $dt=['bills_id'=>1];
        $data['bills'] =$model->findAll('1');
        echo '<pre>'; print_r($data['bills']); echo '</pre>';
    }
}