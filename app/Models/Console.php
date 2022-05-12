<?php

namespace App\Models;

use CodeIgniter\Model;

class Console extends Model
{
    protected $table            = 'console';
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

    public function insert_console($data){
        $inserted = $this->insert($data);
        if($inserted) return true;
        else return false;
    }

    public function edit_console($data){
        $trataeddata=[
            'id'=>$data['id'],
            'nome'=>$data['nome'],
        ];
        
        $edited=$this->replace($trataeddata);

        if($edited) return true;
        else return false;
    }
    
    public function delete_console($id)
    {
        $removed=$this->delete(['id'=>$id]);
        if($removed) return true;
        else return false;
    }
}
