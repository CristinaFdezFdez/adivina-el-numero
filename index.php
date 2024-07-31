<?php 

//Evita los warnings
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Adivina el número</title>
</head>
<body>
<h1>Adivina el número</h1>
    <?php
    if (!isset($_POST["numero"])){
        //Primera carga de página
        $numeroMisterioso = rand(1, 100);
        $oportunidades = 6;
        echo "<br>oportunidades: ", $oportunidades;
    ?>

        <p>He pensado un número del 1 al 100.</p>
        <p>Tienes 6 oportunidades para adivinarlo.</p>
        <p>¡Empieza a jugar!</p>
    <?php
    }

    if (isset($_POST["numero"])){
        //El usuario ha enviado un valor
        $numero = $_POST["numero"];
        $numeroMisterioso = $_POST["numeroMisterioso"];
        $oportunidades = $_POST["oportunidades"];
        $oportunidades --;


        echo "<br>";
        
        if ($numeroMisterioso == $numero){
            echo "🎉🎉🎉 ¡Enhorabuena! ¡Has ganado! 🎉🎉🎉<br>";
        } elseif ($oportunidades == 0) {
            echo "Lo siento ¡Has perdido! 😔<br>
            El número correcto era $numeroMisterioso<br>";
        }
    
    
    }
    if (($numeroMisterioso != $numero) && ($oportunidades > 0)){
        //El juego continua
        if (isset($_POST["numero"])) {
        if ($numeroMisterioso < $numero){
            echo "<br>El número correcto es menor que $numero <br>";
        } else{
            echo "El número correcto es mayor que $numero  <br>";
        }

        echo "Te quedan $oportunidades oportunidades";
    }
    ?>

    <form action="index.php" method="post">
        <label for="numero">Introduce un número: </label> <br> <br>
        <input type="number" name="numero" min="1" max="100" id="numero" required autofocus>
        <input type="submit" value="Aceptar">
        <input type="hidden" name="numeroMisterioso" value="<?= $numeroMisterioso ?>">
        <input type="hidden" name="oportunidades" value="<?= $oportunidades ?>">
    </form>
    <?php
    } else{
    ?>
    <form action="index.php" method="post">
        <input type="submit" value= "Juega otra vez">
    </form>
<?php
    }
    ?>

</body>
</html>