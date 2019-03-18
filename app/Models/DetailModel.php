<?php

namespace App\Models;
use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table = 'details';
    protected $primaryKey ='id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields =['product_id','quantity','price','total'];
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