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
        // print_r($data);
        return $data;
    }
    // public function get_Items_Search($keyword)
    // {
    //     $data=$this->findAll();
    //     $data=$this->$data->where("jogo LIKE '%$keyword%'")->get();
    //     $console=new Console();
    //     $categoria=new Categoria();
    //     $c = 0; 
    //     foreach($data as $elem) {
    //         $data[$c]['nomeConsole'] = $console->get_Item($elem['console'])['nome'];
    //         $data[$c]['nomeCategoria'] = $categoria->get_Item($elem['categoria'])['nome'];
    //         $c++;
    //     }
    //     // print_r($data);
    //     return $data;
    // }
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
 //       $rules = [
 //           'descr' => 'required',
 //           'nome' => 'required',
 //           'idade' => 'required',
 //       ];
 $data=[
    'id'=>$this->request->getVar('id'),
    'nome'=>$this->request->getVar('nome'),
    'preco'=>$this->request->getVar('preco'),
    'descricao'=>$this->request->getVar('descricao'),
    'quantidade'=>$this->request->getVar('quantidade'),
    'console'=>$this->request->getVar('console'),
    'imagem'=>$this->request->getVar('imagem'),
    'categoria'=>$this->request->getVar('categoria'),
];
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
