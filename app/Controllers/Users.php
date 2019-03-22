<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {

    }

    public function get_all_user()
    {
        $model=new UserModel();
        $data=$model->select('*')->get()->getResultArray();
        return $data;
    }

    public function show_all_user()
    {
        echo view('header');
        echo view('all_user');
    }

    public function update_user_order($id)
    {

    }

    public function insert_user()
    {

    }


}