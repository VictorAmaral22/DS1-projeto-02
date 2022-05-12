<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Items;
use App\Models\Console;
use App\Models\Categoria;
use App\Models\Notafiscal;
use App\Models\Compraprodutos;

class NotaFiscalController extends BaseController
{
    public function InsertView() 
    {
        $consoleModel=new Console();
        $console=$consoleModel->get_Items();

        $categoriaModel=new Categoria();
        $categoria=$categoriaModel->get_Items();

        $itensModel=new Items();
        $itens=$itensModel->get_Items();

        $usersModel=new Users();
        $users=$usersModel->get_Users();
        
        return view('carrinho-insert', ['console'=>$console, 'categoria'=>$categoria, 'itens'=>$itens, 'users'=>$users]);
    }

    public function Insert()
    {
        $data = ['usuario' => $this->request->getVar('usuario')];
        $itensModel = new Items();
        $notaFiscalModel = new Notafiscal();
        $notaFiscal = $notaFiscalModel->insert_notaFiscal($data);
        if($notaFiscal){
            $compraprodutosModel = new Compraprodutos();

            $jogos = [['notafiscal'=>$notaFiscal,'produto'=>3, 'qtd'=>1],['notafiscal'=>$notaFiscal,'produto'=>5, 'qtd'=>2],['notafiscal'=>$notaFiscal,'produto'=>7, 'qtd'=>3]];

            // for ($i=1; $i <= 100; $i++) { 
            //     if($this->request->getVar("jogo$i")){
            //         $jogos[] = $this->request->getVar("jogo$i");
            //     }
            // }
            
            $jogosInseridos = [];
            foreach ($jogos as $jogo) {
                $jogosInseridos[] = $compraprodutosModel->insert_compraProdutos($jogo);
                $jogoInfo = $itensModel->get_item($jogo['produto']);
                $itensModel->edit_item(
                    [
                        'id'=> $jogoInfo['id'],
                        'nome'=>$jogoInfo['nome'],
                        'preco'=>$jogoInfo['preco'],
                        'descricao'=>$jogoInfo['descricao'],
                        'quantidade'=> ($jogoInfo['quantidade'] - $jogo['qtd']),
                        'console'=>$jogoInfo['console'],
                        'imagem'=>$jogoInfo['imagem'],
                        'categoria'=>$jogoInfo['categoria'],
                    ]);
            }
            return redirect('/');
        }
        else{
            echo "ERRO";
        }
    }
}
