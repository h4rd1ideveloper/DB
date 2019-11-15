<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once 'Dao.php';
$dao = new Dao('localhost', 'root', '', 'app');
$flag = $dao->connect();
$dao->tableExists('user');
exit(print_r($dao->getResult()));
if ($flag) {
    $dao->select(
        'ocorrencia',
        '*',
        array(
            'inner join produtos  on ocorrencia.produto = produtos.CODPRODUTO',
            'INNER JOIN clientes on clientes.CODCLIENTE = ocorrencia.cliente'
        ),
        array('CODPRODUTO' => '6', 'cliente' => '8')
    );
    //print_r($dao);
    echo '<pre>';
    print_r($dao->getResult());
    exit;
} else {
    echo 'not Connected';
}
