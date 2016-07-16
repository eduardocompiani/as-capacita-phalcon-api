<?php
namespace App\Produtos\Controllers;

use App\Controllers\RESTController;
use App\Produtos\Models\Produtos;


class ProdutosController extends RESTController
{
    // função que lista todos os Produtos
    public function getProdutos()
    {
        try {
            $produtos = (new Produtos())->find();

            return $produtos;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    //função que retorna um produto especifico
    public function getProduto($idProduto){
        try{
            $produto = (new Produtos())->findFirst(
                [
                    'conditions' => "idProduto = '$idProduto'",
                    'columns' => $this->partialFields,
                ]
            );
            return $produto;
        } catch(Exception $e){
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    public function addProduto()
    {
        try {
            $usersModel = new Produtos();
            $usersModel->nmProduto = $this->di->get('request')->getPost('nmProduto');
            $usersModel->vlProduto = $this->di->get('request')->getPost('vlProduto');

            $usersModel->saveDB();

            return $usersModel;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    public function editProduto($idProduto)
    {
        try {
            $put = $this->di->get('request')->getPut();

            $produto = (new Produtos())->findFirst($idProduto);

            if (false === $produto) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $produto->nmProduto = isset($put['nmProduto']) ? $put['nmProduto'] : $produto->nmProduto;
            $produto->vlProduto = isset($put['vlProduto']) ? $put['vlProduto'] : $produto->vlProduto;

            $produto->saveDB();

            return $produto;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    public function deleteProduto($idProduto)
    {
        try {
            $produto = (new Produtos())->findFirst($idProduto);

            if (false === $produto) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $produto->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

}
