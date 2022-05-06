<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Notafiscal;

class Users extends Model
{
    protected $table            = 'usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nome','email', 'senha', 'dataregist'];

    public function get_Users()
    {
        $data=$this->findAll();
        return $data;
    }

    public function get_User($id)
    {
        $data=$this->find($id);
        return $data;
    }

    public function insert_user($data){
        $inserted = $this->insert($data);
        if($inserted) return true;
        else return false;
    }

    public function delete_user($id)
    {
        $removed=$this->delete(['id'=>$id]);
        if($removed) return true;
        else return false;
    }
    
    public function edit_user($data)
    {   
        $trataeddata=[
            'id'=>$data['id'],
            'nome'=>$data['nome'],
            'email'=>$data['email'],
            'senha'=>$data['senha'],
            'dataregist'=>$data['dataregist'],
        ];
        
        $edited=$this->replace($trataeddata);
        
        if($edited) return true;
        else return false;
    }

    public function user_buy_products($user, $games)
    {   
        $notaModel = new Notafiscal();
        $nota = $notaModel->insert_notaFiscal($user);

        // foreach($games as $game) {
        //     $data = $this->find($id);
        // }
        // return $data;
    }
}