<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria extends Model
{
    protected $table            = 'categoria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nome'];

    public function get_Items()
    {
        $data=$this->findAll();
        return $data;
    }
    public function get_Item($id)
    {
        $data=$this->find($id);
        return $data;
    }
}
