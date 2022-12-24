<html>
    <head>
        <meta charset="utf-8" />
        <title>Variaveis PHP</title>
    </head>
    <body>
        <?php 
            //strings
            $nome = "Alvaro Gomes";
            //int
            $idade = 19;
            //float 
            $peso = 62.6;
            //booleana
            $gamer = true;
            //variavel constante;
            define('BD_USER','bd_user_dev');
            echo BD_USER;
        ?>
        
        <h1>Ficha cadastral</h1>
        <p>Nome: <?php echo $nome ?> </p>
        <p>Idade: <?php echo $idade ?> </p>
        <p>Peso: <?php echo $peso ?> </p>
        <p>Gamer: <?php echo $gamer ?> </p>

    </body>
</html>