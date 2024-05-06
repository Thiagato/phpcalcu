<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
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
    input[type="number"]{
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
    input[type=number]::-webkit-outer-spin,
    input[type=number]::-webkit-inner-spin-button{
        -webkit-appearance: none;
        margin: 0;
    }
   

    </style>
<body>
    <?php
    include 'function.php';
    session_start();

   
    $num1 = null;
    $num2 = null;
    $operador = null;
    $resultado = null;


    // Verifica se o formulário foi enviado
    if (isset($_POST['salvar'])) {
        // Salva os valores do formulário na sessão
        
        $num1 = $_SESSION["num1"] = $_POST['num1'];
        $num2 = $_SESSION["num2"] = $_POST['num2'];
        $operador =$_SESSION["operador"] = $_POST['operador'];
        echo "Informação salva!";
        

    }

    // Verifica se o botão "Pegar" foi pressionado
    if (isset($_POST['pegar'])) {
        // Preenche os campos do formulário com os valores salvos na sessão
        $num1 = $_SESSION["num1"] ?? null;
        $num2 = $_SESSION["num2"] ?? null;
        $operador = $_SESSION["operador"] ?? null;
        echo "Informação realocada!";
    }
    

    if(isset($_POST['m'])){
        // Verifica se os campos num1 e num2 estão vazios
        if(empty($_POST['num1']) || empty($_POST['num2'])) {
            echo "Por favor, preencha os valores para salvar.";
        } else {
            if(!isset($_SESSION['contador']) || $_SESSION['contador'] == 2) {
                $num1 = $_SESSION["num1"] = $_POST['num1'];
                $num2 = $_SESSION["num2"] = $_POST['num2'];
                $operador =$_SESSION["operador"] = $_POST['operador'];
                $_SESSION['contador'] = 1;
                echo "Informação salva!";
                
            } elseif($_SESSION['contador']  == 1) {
                $_SESSION['contador'] = 2;
                $_POST['calcular'] = "C";
                $num1 = $_SESSION['num1'];
                $num2 = $_SESSION['num2'];
                $operador = $_SESSION['operador'];
                echo "Informação realocada!";    
            }
        }
    }
    
    
    ?>
 <div class = "container">
    <h2>Calculadora PHP</h2>
    <form method="post">
        <input type="number" name="num1" value="<?= $num1 ?>" placeholder="Digite o primeiro número">
        <select name="operador">
            <option value="+" <?= ($operador == '+') ? 'selected' : '' ?>>Somar (+)</option>
            <option value="-" <?= ($operador == '-') ? 'selected' : '' ?>>Subtrair (-)</option>
            <option value="x" <?= ($operador == 'x') ? 'selected' : '' ?>>Multiplicar (*)</option>
            <option value="/" <?= ($operador == '/') ? 'selected' : '' ?>>Dividir (/)</option>
            <option value="!" <?= ($operador == '!') ? 'selected' : '' ?>>Fatorial (n!)</option>
            <option value="^" <?= ($operador == '^') ? 'selected' : '' ?>>Potenciar (^)</option>
        </select>
        <input type="number" name="num2" value="<?= $num2 ?>" placeholder="Digite o segundo número">
            <button type="submit" name="calcular" value="Calcular" class="btn btn-outline-success">Calcular</button>
            <button type="submit" name="salvar" class="btn btn-outline-warning">Salvar</button>
            <button type="submit" name="pegar" class="btn btn-outline-warning">Pegar</button>
            <button type="submit" name="m" class="btn btn-outline-primary">M</button>
            <button type="submit" name="limpar" class="btn btn-outline-danger">Limpar Historico</button>
    </form>

    <?php
    // Exibe o resultado do cálculo se existir

    
        
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calcular'])) {

        if($_POST['calcular'] == "Calcular"){ 
            $resultado = realizarCalculo($_POST['num1'], $_POST['num2'], $_POST['operador']);
            $historico = array($_POST['num1'], $_POST['num2'], $_POST['operador'], $resultado);
            adicionarAoHistorico($historico);
        }
        if($resultado != "deu n")
        {
            echo "<h3>".$_POST['num1']. " ".$_POST['operador'] . " ". $_POST['num2']." = ". realizarCalculo($_POST['num1'], $_POST['num2'], $_POST['operador']) ."</h3>";
        }

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['limpar'])) {
        session_destroy();
    }

    
    exibirHistorico();

    
    ?>
</body>
</html>
