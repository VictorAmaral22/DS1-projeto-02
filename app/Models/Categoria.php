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

    public function insert_categoria($data){
        $inserted = $this->insert($data);
        if($inserted) return true;
        else return false;
    }

    public function edit_categoria($data){
        $trataeddata=[
            'id'=>$data['id'],
            'nome'=>$data['nome'],
        ];
        
        $edited=$this->replace($trataeddata);

        if($edited) return true;
        else return false;
    }
    
    public function delete_categoria($id)
    {
        $removed=$this->delete(['id'=>$id]);
        if($removed) return true;
        else return false;
    }
    
}
