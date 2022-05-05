<?php

namespace App\Controllers;


// use App\Models\Items;
use App\Models\Console;
// use App\Models\Categoria;


class ConsolesController extends BaseController
{
    public function getAllConsoles() {
        $categoriesModel=new Console();
        $categories = $categoriesModel->get_Items();
        return view('categoria-all', ['data'=>$categories]);
    }

    public function CadastroView() 
    {
        return view('user-insert');
    }

    public function Cadastrar() 
    {
        $nome=$this->request->getVar('nome');
        $email=$this->request->getVar('email');
        $senha=$this->request->getVar('senha');
        $dataregist=$this->request->getVar('dataregist');

        $data=[
            'nome'=>$this->request->getVar('nome'),
            'email'=>$this->request->getVar('email'),
            'senha'=>$this->request->getVar('senha'),
            'dataregist'=>$this->request->getVar('dataregist'),
        ];

        $userModel=new Users();
        $inserted=$userModel->insert_user($data);
        if($inserted){
            return redirect('/');
        }
        else{
            echo "ERRO";
        }
    }
}