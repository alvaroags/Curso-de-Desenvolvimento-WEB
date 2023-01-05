<?php
//Importando bibliotecas criadas por mim mesmo, basta fazer o import ou o require
//Como na biblioteca existe a mesma classe com valores diferentes haveria conflito, para consertar isso basta usar um aliasing que irá dar um apelido para aquela classe

require "./bibliotecas/lib1/lib1.php";
require "./bibliotecas/lib2/lib2.php";

use \A\Cliente as C1;
use \B\Cliente as C2;

$cliente = new C1();
print_r($cliente);

?>