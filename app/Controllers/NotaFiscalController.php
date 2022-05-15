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
        $itens=$itensModel->get_ItemsInStock();

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

            // $jogos = [['notafiscal'=>$notaFiscal,'produto'=>3, 'qtd'=>1],['notafiscal'=>$notaFiscal,'produto'=>5, 'qtd'=>2],['notafiscal'=>$notaFiscal,'produto'=>7, 'qtd'=>3]];
            $jogos = [];

            for ($i=1; $i <= 100; $i++) { 
                if($this->request->getVar("jogo$i") && $this->request->getVar("qtd$i")){
                    $jogos[] = [
                        'notafiscal' => $notaFiscal, 
                        'produto' => $this->request->getVar("jogo$i"),
                        'qtd' => $this->request->getVar("qtd$i"),
                    ];
                }
            }
            print_r($jogos);
            
            $jogosInseridos = [];
            foreach ($jogos as $jogo) {
                $jogoInfo = $itensModel->get_item($jogo['produto']);
                $jogo['valor'] = $jogoInfo['preco']*$jogo['qtd'];
                $jogosInseridos[] = $compraprodutosModel->insert_compraProdutos($jogo);
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

    public function notasFiscaisView() 
    {
        $consoleModel=new Console();
        $console=$consoleModel->get_Items();

        $itensModel=new Items();
        $itens=$itensModel->get_Items();

        $usersModel=new Users();
        $users=$usersModel->get_Users();
        $totalPerUser = [];
        foreach($users as $user){
            $totalPerUser[$user['id']] = 0;
        }

        $notaFiscalModel = new Notafiscal();
        $compraProdutosModel = new Compraprodutos();
        $notasFiscais = $notaFiscalModel->get_NotasFiscais();
        $newNotasFiscais = [];
        foreach ($notasFiscais as $nota) {
            $nota['produtos'] = $compraProdutosModel->get_produtosByCompra($nota['id']);
            $total = 0;
            
            foreach($nota['produtos'] as $produto){
                $nota['produtoInfo'] = $itensModel->get_Item($produto['produto']);
                $total += $produto['valor'];
            }
            $nota['total'] = $total;

            $totalPerUser[$nota['usuario']] += $total;
            
            $newNotasFiscais[] = $nota;
        }

        $newUsers = [];
        foreach ($users as $user) {
            $user['totalGasto'] = $totalPerUser[$user['id']];
            $newUsers[] = $user;
        }
        
        return view('notafiscal-all', ['consoles' => $console, 'itens' => $itens, 'users' => $newUsers, 'notasFiscais' => $newNotasFiscais]);
    }
    public function notasFiscaisUserView($id) 
    {
        $consoleModel=new Console();
        $console=$consoleModel->get_Items();

        $itensModel=new Items();
        $itens=$itensModel->get_Items();

        $usersModel=new Users();
        $user=$usersModel->get_User($id);

        $notaFiscalModel = new Notafiscal();
        $compraProdutosModel = new Compraprodutos();
        $notasFiscais = $notaFiscalModel->get_NotasFiscaisByUser($id);
        $newNotasFiscais = [];
        foreach ($notasFiscais as $nota) {
            $nota['produtos'] = $compraProdutosModel->get_produtosByCompra($nota['id']);
            $total = 0;
            
            foreach($nota['produtos'] as $produto){
                $nota['produtoInfo'] = $itensModel->get_Item($produto['produto']);
                $total += $produto['valor'];
            }
            $nota['total'] = $total;
            
            $newNotasFiscais[] = $nota;
        }
        
        return view('notafiscal-details', ['consoles' => $console, 'itens' => $itens, 'user' => $user, 'notasFiscais' => $newNotasFiscais]);
    }
}
