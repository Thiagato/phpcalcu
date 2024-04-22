<?php
session_start();
// ===================== OPERAÇÕES
function somar($num1, $num2){

return $num1 + $num2;

}

function subtrair($num1, $num2){

    return $num1 - $num2;
    
}

function multiplicar($num1, $num2){

    return  $num1 * $num2;
    
}

function dividir($num1, $num2){

    if ($num2 != 0) {
        return $num1 / $num2;
    } else {
        return "Não é possível dividir por zero.";
    }
    
}

function fatorar($num1){

    return array_product(range($num1, 1));
    
}

function potencia($num1, $num2){

    return $num1 ** $num2;
    
}
// ======================== BOTOES

function historico($num1, $num2, $operador, $resultado) {
    if (!isset($_SESSION['historico'])) {
        $_SESSION['historico'] = array();
    }
    $_SESSION['historico'][] = array(
        'num1' => $num1,
        'num2' => $num2,
        'operador' => $operador,
        'resultado' => $resultado
    );
}

function adicionarAoHistorico($historico) {
    $_SESSION['historico'][] = $historico;
}

function exibirHistorico() {
    echo "<h3>Histórico de cálculos:</h3>";
    echo "<ul>";
    foreach ($_SESSION['historico'] as $calc) {
        echo "<li>";
        echo "{$calc[0]} {$calc[2]} {$calc[1]} = {$calc[3]}";
        echo "</li>";
    }
    echo "</ul>";
}

function salvar($num1, $num2, $operador, $resultado){
   return array($num1, $operador, $num2, $resultado);
}


function apagarHistorico($num1, $num2, $operador){
    
}

function pegarValores($num1, $num2, $operador){
    
}

function m($num1, $num2, $operador){
    
}

?>