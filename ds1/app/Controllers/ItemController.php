<?php

namespace App\Controllers;

use App\Models\Items;

class ItemController extends BaseController
{
    public function showRegisterForm()
    {
        return view('formulario');
    }
    public function InsertProduct()
    {
        $nome=$this->request->getVar('nome');
        $preco=$this->request->getVar('preco');
        $descricao=$this->request->getVar('descricao');
        $quantidade=$this->request->getVar('quantidade');
        $console=$this->request->getVar('console');
        $imagem=$this->request->getVar('imagem');
        $categoria=$this->request->getVar('categoria');
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
        $model=new Items();
        $inserted=$model->insert_Items($data);
        if($inserted){
            return redirect('/');
        }
        else{
            echo "ERRO";
        }
    }
    public function index(){
        $model=new Items();
        $data=$model->get_Items();
        return view('items-show',['data'=>$data]);
    }
    public function deleteProduct($id)
    {
        $model=new Items();
        $removed=$model->delete_Item($id);
        if($removed) return redirect('/');
        else echo "Erro";
    }
    public function getEditProduct($id){
        $model=new Items();
        $data=$model->get_Item($id);
        return view('item-edit',['data'=>$data]);
    }
    public function postEditProduct()
    {
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
        $model=new Items();
        $edited=$model->getEditProducty($data);
        if($edited) {
            if (! $this->validate([])) {
                echo view('items-show', [
                    'validation' => $this->validator,
                ]);
            } else {
                echo view('welcome_message');
            }
            
        }
        else echo "Erro";
    }
}
