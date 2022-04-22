<?php

namespace App\Models;

use CodeIgniter\Model;

class Items extends Model
{
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nome','idade','descr'];

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
    public function insert_Items($data)
    {
        $inserted=$this->insert($data);
        if($inserted) return true;
        else return false;
    }
    public function delete_item($id)
    {
        $removed=$this->delete(['id'=>$id]);
        if($removed) return true;
        else return false;
    }
    
    public function edit_item($data)
    {   
        $rules = [
            'descr' => 'required',
            'nome' => 'required',
            'idade' => 'required',
        ];
        $trataeddata=[
            'id'=>$data['id'],
            'nome'=>$data['nome'],
            'idade'=>$data['idade'],
            'descr'=>$data['descr']
        ];
        $edited=$this->replace($trataeddata);
        if($edited) return true;
        else return false;
        
    }
}
