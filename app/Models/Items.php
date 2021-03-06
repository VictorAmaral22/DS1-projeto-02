<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Console;
use App\Models\Categoria;

class Items extends Model
{
    protected $table            = 'jogo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nome','descricao', 'preco', 'categoria', 'imagem', 'dataregist', 'console', 'quantidade'];

    public function get_Items()
    {
        $data=$this->findAll();
        $console=new Console();
        $categoria=new Categoria();
        $c = 0; 
        foreach($data as $elem) {
            $data[$c]['nomeConsole'] = $console->get_Item($elem['console'])['nome'];
            $data[$c]['nomeCategoria'] = $categoria->get_Item($elem['categoria'])['nome'];
            $c++;
        }
        return $data;
    }

    public function get_ItemsInStock()
    {
        $data=$this->where('quantidade >', 0)->findAll();
        $console=new Console();
        $categoria=new Categoria();
        $c = 0; 
        foreach($data as $elem) {
            $data[$c]['nomeConsole'] = $console->get_Item($elem['console'])['nome'];
            $data[$c]['nomeCategoria'] = $categoria->get_Item($elem['categoria'])['nome'];
            $c++;
        }
        
        return $data;
    }
    
    public function get_Item($id)
    {
        $console=new Console();
        $data=$this->find($id);
        $data['nomeConsole'] = $console->get_Item($data['console'])['nome'];
        
        return $data;
    }
    // public function get_Item_Names($id)
    // {
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('jogo');
    //     $builder->select('nome, imagem');
    //     $query = $builder->getWhere(['id' => $id]);
    //     return $query;
    // }
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
        $trataeddata=[
            'id'=>$data['id'],
            'nome'=>$data['nome'],
            'preco'=>$data['preco'],
            'descricao'=>$data['descricao'],
            'quantidade'=>$data['quantidade'],
            'console'=>$data['console'],
            'imagem'=>$data['imagem'],
            'categoria'=>$data['categoria'],
        ];

        $edited=$this->replace($trataeddata);
        
        if($edited) return true;
        else return false;
        
    }
}
