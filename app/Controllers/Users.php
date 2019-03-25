<?php
namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\Orders_ProductsModel;
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

    public function show_add_user()
    {
        echo view('header');
        echo view('add_user');
    }

    public function add_user()
    {
        $data=
            [
                'name'=>$_POST['user_name'],
                'address'=>$_POST['user_address'],
                'tel'=>$_POST['user_tel']
            ];
        $model=new UserModel();
        $model->insert($data);
        $this->show_add_user();
    }

    public function get_edit_user()
    {
        $model=new UserModel();
        $id=$_GET['id_user_edit'];
        $data=$model->where('id=',$id)->get()->getRowArray();
       return $data;
    }

    public function show_edit_user()
    {
        echo view('header');
        echo view('edit_user');
    }

    public function update_user()
    {
        $id=$_GET['user_id_update'];
        $data=
            [
                'name'=>$_GET['user_name_update'],
                'address'=>$_GET['user_address_update'],
                'tel'=>$_GET['user_tel_update']
            ];
        $model=new UserModel();
        $model->update($id,$data);
        $this->show_all_user();
    }

    public function delete_user()
    {
        $model_order=new OrderModel();
        $model_user=new UserModel();
        $model_order_product=new Orders_ProductsModel();

        $id=$_GET['id_user_del'];
        $data=$model_order->select('id')->where('user_id=',$id)->get()->getResultArray();
        $arr_order_id=array(count($data));
        for($i=0;$i<count($data);$i++)
        {
            $arr_order_id[$i]=$data[$i]['id'];
        }

        for($i=0;$i<count($data);$i++)
        {
            $temp=$model_order_product->where('id=',$arr_order_id[$i])->get()->getRowArray();
            if(isset($temp))
            {
                $model_order_product->delete($arr_order_id[$i],true);
            }
        }

        for($i=0;$i<count($data);$i++)
        {
            $temp=$model_order->where('id=',$arr_order_id[$i])->get()->getRowArray();
            if(isset($temp))
            {
                $model_order->delete($arr_order_id[$i],true);
            }
        }

        $model_user->delete($id,true);
        $this->show_all_user();
    }
}