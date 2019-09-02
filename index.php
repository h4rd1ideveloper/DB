<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once 'Dao.php';
$dao = new Dao('localhost', 'root', '', 'criacaotelas');
$flag = $dao->connect();
if ($flag) {
    //SELECT * from ocorrencia  inner join produtos  on ocorrencia.produto = produtos.CODPRODUTO where CODPRODUTO = '6' ;
    /**
     * if ($join !== null) {
     * if (!is_array($join)) {
     * $q .= $join;
     * } else {
     * $join && $q .= sprintf(" %s %s on ", $join['type'], $join['table']);
     * if (!is_array($join['on'])) {
     * $q .= sprintf(" %s ", $join['on']);
     * } else {
     * $q = self::keyAndValue($q, $join['on']);
     * }
     * }
     * }
     */
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
