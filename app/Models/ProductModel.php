<?php
/**
 * Created by PhpStorm.
 * User: TieuCa
 * Date: 11/03/2019
 * Time: 2:05 PM
 */
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['product_name','import','cost_import','cost_export'];
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

