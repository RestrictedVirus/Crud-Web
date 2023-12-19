<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $allowedFields = ['id','product_name', 'unit', 'quantity', 'price'];

    public function getProduct()
    {
        return $this->findAll();
    }
}
