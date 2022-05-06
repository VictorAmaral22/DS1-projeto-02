<?php

namespace App\Controllers;

use App\Models\Users;
// use App\Models\Items;
// use App\Models\Console;
// use App\Models\Categoria;


class UsersController extends BaseController
{
    public function ViewUsers() {
        $userModel=new Users();
        $users = $userModel->get_Users();
        return view('user-show', ['data'=>$users]);
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

        $data=[
            'nome'=>$this->request->getVar('nome'),
            'email'=>$this->request->getVar('email'),
            'senha'=>$this->request->getVar('senha'),
        ];

        $userModel=new Users();
        $inserted=$userModel->insert_user($data);
        if($inserted){
            return redirect('users');
        }
        else{
            echo "ERRO";
        }
    }
    
    public function getEditUser($id){
        $model=new Users();
        $data=$model->get_User($id);
        return view('user-edit',['data'=>$data]);
    }
    
    public function editUser ($id) {
        $model = new Users();
        $nome=$this->request->getVar('nome');
        $email=$this->request->getVar('email');
        $senha=$this->request->getVar('senha');
        
        $data = $model->edit_user(['id' => $id, 'nome'=>$nome, 'email'=>$email, 'senha'=>$senha]);
        if($data){
            return redirect('users');
        } else {
            echo view('welcome_message');
        }
    }

    public function deleteUser ($id) {
        $model=new Users();
        $removed=$model->delete_user($id);
        if($removed) return redirect('users');
        else echo "Erro";
    }
}