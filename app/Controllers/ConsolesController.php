<?php

namespace App\Controllers;

use App\Models\Console;

class ConsolesController extends BaseController
{
    public function getAllConsoles() {
        $consolesModel=new Console();
        $consoles = $consolesModel->get_Items();
        return view('console-all', ['data'=>$consoles]);
    }

    public function showCreateConsoleForm() 
    {
        return view('console-insert');
    }

    public function createConsole() 
    {
        $data=[
            'nome'=>$this->request->getVar('nome'),
        ];

        $consolesModel=new Console();
        $inserted=$consolesModel->insert_console($data);
        if($inserted){
            return redirect('consoles/view');
        }
        else{
            echo "ERRO";
        }
    }

    public function showEditConsoleForm ($id) {
        $consolesModel=new Console();
        $console = $consolesModel->get_Item($id);
        return view('console-edit', ['data'=>$console]);
    }
    
    public function editConsole ($id) {
        $consoleModel=new Console();
        
        $edited=$consoleModel->edit_console(['id'=>$id, 'nome'=>$this->request->getVar('nome')]);
        if($edited) {
            if (! $this->validate([])) {
                return redirect('consoles/view');
            } else {
                echo view('welcome_message');
            }
            
        }
    }
    
    public function deleteConsole ($id) {
        $model=new Console();
        $removed=$model->delete_console($id);
        if($removed) return redirect('consoles/view');
        else echo "Erro";
    }
}