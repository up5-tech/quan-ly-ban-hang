<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class Home extends Controller
{
    public function index()
    {
        echo view('header');
        echo view('main');
    }


}
