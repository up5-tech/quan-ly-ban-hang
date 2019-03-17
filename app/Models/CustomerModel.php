<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields =['name','address','tel'];
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

