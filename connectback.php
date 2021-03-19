<?php
//conectando ao banco de dados local (nomeservidor,username,senha, nomedatabase)

$conn = new mysqli("localhost","root","","cxdi");
if($conn->connect_error){
    die("Não conectado".$conn->connect_error);
}
?>