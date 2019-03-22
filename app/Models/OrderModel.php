<?php

namespace App\Models;
use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields =['personnel_id','date_of_sale','cus_id','total'];
    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages =[];
    protected $skipValidation     = false;

    protected $insertID=[];
    protected $beforeInsert=[];
    protected $afterInsert=[];

    protected $beforeDelete=[];
    protected $afterDelete=[];

    protected $QBFrom=[];
    protected $validation=[];

}

