<?php
namespace App\Produtos\Models;

/**
 * Model da tabela 'Users'
 *
 * @package App\Users\Models
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class Produtos extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $idProduto;

    /**
     * @Column(type="string", length=10, nullable=false)
     */
    public $nmProduto;

    /**
     * @Column(type="string", length=15, nullable=false)
     */
    public $vlProduto;
}
