<?php

namespace App\Controllers;

use App\Models\Categoria;
// use App\Models\Items;
// use App\Models\Console;


class CategoriesController extends BaseController
{
    public function getAllCategories() {
        $categoriesModel=new Categoria();
        $categories = $categoriesModel->get_Items();
        return view('categoria-all', ['data'=>$categories]);
    }

    public function showCreateCategoryForm() 
    {
        return view('categoria-insert');
    }

    public function createCategory() 
    {
        $nome=$this->request->getVar('nome');
        $data=[
            'nome'=>$this->request->getVar('nome'),
        ];

        $userModel=new Categoria();
        $inserted=$userModel->insert_categoria($data);
        if($inserted){
            return redirect('categorias/view');
        }
        else{
            echo "ERRO";
        }
    }

    public function showEditCategoryForm ($id) {
        $categoriesModel=new Categoria();
        $categoria = $categoriesModel->get_Item($id);
        return view('categoria-edit', ['data'=>$categoria]);
    }
    
    public function editCategory ($id) {
        $categoriaModel=new Categoria();
        
        $edited=$categoriaModel->edit_categoria(['id'=>$id, 'nome'=>$this->request->getVar('nome')]);
        if($edited) {
            if (! $this->validate([])) {
                return redirect('categorias/view');
            } else {
                echo view('welcome_message');
            }
            
        }
    }
    
    public function deleteCategory ($id) {
        $model=new Categoria();
        $removed=$model->delete_categoria($id);
        if($removed) return redirect('categorias/view');
        else echo "Erro";
    }
}