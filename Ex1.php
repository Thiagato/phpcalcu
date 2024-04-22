<!DOCTYPE html>
<html>
<head><style>
    body {
        background-color: cadetblue;
        color: white;
        font-family: Arial, sans-serif;
    }
    .container {
            width: 50%; 
            margin: 0 auto;
            padding: 20px; 
            background-color: rgb(30, 49, 65); 
            border-radius: 10px;
            margin-top: 50px; 
        }
    select {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    input[type="text"]{
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        background-color: white;
        color: black;
    }
    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    } 
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
    <title>Calculadora PHP</title>
</head>
<body>
    <div class = "container">
    
    <h2>Calculadora PHP</h2>
    <form method="post">
        <input type="text" name="num1" placeholder="Digite o primeiro número" required>
        <select name="operador">
            <option value="somar">Somar</option>
            <option value="menos">Subtrair</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>
        <input type="text" name="num2" placeholder="Digite o segundo número" required>
        <input type="submit" value="Calcular">
        <?php
    $num1 = isset($_POST["num1"]) ? $_POST["num1"] : '';
    $num2 = isset($_POST["num2"]) ? $_POST["num2"] : '';
    $operador = isset($_POST["operador"]) ? $_POST["operador"] : '';

    if ($num1 !== '' && $num2 !== '' && $operador !== '') {
        $resultado = 0;

        switch ($operador) {
            case 'somar':
                $resultado = $num1 + $num2;
                break;
            case 'menos':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicar':
                $resultado = $num1 * $num2;
                break;
            case 'dividir':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    echo "Não é possível dividir por zero.";
                }
                break;
            default:
                echo "Operação inválida";
                break;
        }
        
        
        echo "<h3>O resultado é: $resultado</h3>";
    }
    echo oi brito;
    ?>
    </form>
    

</body>
</html>