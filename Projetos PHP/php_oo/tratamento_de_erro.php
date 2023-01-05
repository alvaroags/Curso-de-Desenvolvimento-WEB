<?php
// Try é usado quando irá realizar uma lógica mas que tenha potencial de erro
//Catch se houver erro ou exceção no try ele irá tratar isso de alguma outra forma
// finally Quando terminar tudo será executado
// throw ele intencionalmente poe lançar erros ou execeções que podem ser tratados por meio do catch

try {
    echo '<h3> *** TRY *** </h3>';

    $sql = 'Select * from  clientes';
    //mysql_query($sql); //Erro
    if (!file_exists('require_arquivo.php')){
        throw new Exception('O arquivo em questão deveria estar disponivel');
    }
} 

catch(Error $e){
    echo '<h3> *** CATCH ERROR *** </h3>';
    echo '<p style="color: red">' . $e . '</p>';
} 
catch(Exception $e){
    echo '<h3> *** CATCH EXCEPTION *** </h3>';
    echo '<p style="color: red">' . $e . '</p>';
}

finally{
    echo '<h3> *** FINALLY *** </h3>';
}
?>