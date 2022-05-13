<?php

namespace App\Models;

use CodeIgniter\Model;

class Notafiscal extends Model
{
    protected $table            = 'notafiscal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['usuario'];

    public function get_NotasFiscais()
    {
        $data=$this->findAll();
        return $data;
    }
    
    public function get_NotasFiscaisByUser($user)
    {
        $data=$this->where('usuario', $user)->findAll();
        return $data;
    }

    public function insert_notaFiscal($data){
        $inserted = $this->insert($data);
        if($inserted) return $inserted;
        else return false;
    }
}