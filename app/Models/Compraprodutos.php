<?php

namespace App\Models;

use CodeIgniter\Model;

class Compraprodutos extends Model
{
    protected $table            = 'compraprodutos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['notafiscal','produto', 'qtd', 'valor'];

    public function get_CompraProdutos()
    {
        $data=$this->findAll();
        return $data;
    }

    public function get_CompraProduto($id)
    {
        $data=$this->find($id);
        return $data;
    }

    public function get_produtosByCompra($compra)
    {
        $data=$this->where('notafiscal', $compra)->findAll();
        return $data;
    }

    public function insert_compraProdutos($data){
        $inserted = $this->insert($data);
        if($inserted) return true;
        else return false;
    }
}