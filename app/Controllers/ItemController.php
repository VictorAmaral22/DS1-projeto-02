<?php

namespace App\Controllers;

use App\Models\Items;

use App\Models\Console;

use App\Models\Categoria;

class ItemController extends BaseController
{
    public function showRegisterForm()
    {
        return view('formulario');
    }
    public function InsertView() 
    {
        $consoleModel=new Console();
        $console=$consoleModel->get_Items();
        $categoriaModel=new Categoria();
        $categoria=$categoriaModel->get_Items();
        
        return view('items-insert', ['console'=>$console, 'categoria'=>$categoria]);
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
        if($this->request->getGet('search')){
            $search=$this->request->getGet('search');
            $data=$model->like('nome', $search)->get_Items();
        } else if($this->request->getGet('filter')){
            $filter=$this->request->getGet('filter');
            $data=$model->where('console', $filter)->get_Items();
        } else if($this->request->getGet('category')){
             $category=$this->request->getGet('category');
             $data=$model->where('categoria', $category)->get_Items();
        } else if($this->request->getGet('order') == 'PriceAsc'){
            $orderPriceAsc=$this->request->getGet('order');
            $data=$model->orderBy('preco', $orderPriceAsc)->get_Items();
       }
       else if($this->request->getGet('order') == 'PriceDesc'){
            $orderPriceDesc=$this->request->getGet('order');
            $data=$model->orderBy('preco', 'DESC')->get_Items();
       }else if($this->request->getGet('order') === 'QuantDesc'){
            $orderQuant=$this->request->getGet('order');
            $data=$model->orderBy('quantidade', 'DESC')->get_Items();
       }
        else {
            $data=$model->get_Items();
        }
        $consoleModel=new Console();
        $console=$consoleModel->get_Items();
        $categoriaModel=new Categoria();
        $categoria=$categoriaModel->get_Items();
        return view('items-show',['data'=>$data, 'console'=>$console, 'categoria'=>$categoria]);
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
        $categoriaModel=new Categoria();
        $categoria=$categoriaModel->get_Items();
        $consoleModel=new Console();
        $console=$consoleModel->get_Items();
        $data=$model->get_Item($id);
        return view('item-edit',['data'=>$data, 'console'=>$console, 'categoria'=>$categoria ]);
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
        $edited=$model->edit_item($data);
        if($edited) {
            if (! $this->validate([])) {
                return redirect('/');
            } else {
                echo view('welcome_message');
            }
            
        }
        else echo "Erro";
    }
}
