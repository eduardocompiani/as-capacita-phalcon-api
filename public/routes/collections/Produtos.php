<?php
return call_user_func(
    function () {
        $userCollection = new \Phalcon\Mvc\Micro\Collection();

        $userCollection
            ->setPrefix('/v1/produtos')
            ->setHandler('\App\Produtos\Controllers\ProdutosController')
            ->setLazy(true);

        $userCollection->get('/', 'getProdutos');
        $userCollection->get('/{id:\d+}', 'getProduto');

        $userCollection->post('/', 'addProduto');

        $userCollection->put('/{id:\d+}', 'editProduto');

        $userCollection->delete('/{id:\d+}', 'deleteProduto');

        return $userCollection;
    }
);
