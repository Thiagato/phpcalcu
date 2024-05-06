<?php 

function realizarCalculo($num1, $num2, $operador) {
    if($num1 != null || $num2 != null){
            switch ($operador) {
                case '+':
                    return $num1 + $num2;
                case '-':
                    return $num1 - $num2;
                case 'x':
                    return $num1 * $num2;
                case '/':
                    if ($num2 != 0) {
                        return $num1 / $num2;
                    } else {
                        return 'Erro: Divisão por zero';
                    }
                case '!':
                    if($num1 == null){
                    return factorial($num2);
                    }
                    return factorial($num1);
                case '^':
                    return pow($num1, $num2);
                default:
                    return 'Operador inválido';
            }
            }
            else{
                return "deu n";
            }
        }


// Função para calcular fatorial
function factorial($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}


function adicionarAoHistorico($historico) {
    if($historico[3] != "deu n"){
    $_SESSION['historico'][] = $historico;
 }
}

function exibirHistorico() {
    echo "<h3>Histórico de cálculos:</h3>";
    if(isset($_SESSION['historico'])){
    echo "<ul>";
    foreach ($_SESSION['historico'] as $calc) {
        echo "<li>";
        echo "{$calc[0]} {$calc[2]} {$calc[1]} = {$calc[3]}";
        echo "</li>";
    }}
    echo "</ul>";
}





?>