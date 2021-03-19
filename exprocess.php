<?php 
session_start();

$numid=0;
$atualizar= false;
$numid= '';
$solicitante= ' ';
$numchamado= '';
$setor= ' ';
$datareg= '';
$motivo = ' ';
$datacon= '';
$mysqli = new mysqli('localhost', 'root', '', 'cxdi') or die(mysqli_error($mysqli));
    //create
if (isset($_POST['add'])){
    $numid =$_POST['numid'];
    $solicitante =$_POST['solicitante'];
    $numchamado =$_POST['numchamado'];
    $setor =$_POST['setor'];
    $datareg =$_POST['datareg'];
    $motivo =$_POST['motivo'];
    $datacon =$_POST['datacon'];
    $_SESSION['mensagem'] = "Melhoria registrada com sucesso";
    $_SESSION['tipomsg'] = 'success';
    header("location: index3.php");

    $mysqli->query("INSERT INTO excluir (numid, solicitante, datareg, numchamado, setor, motivo, datacon) 
    VALUES ('$numid', '$solicitante', '$datareg','$numchamado', '$setor', '$motivo', '$datacon')") or die($mysqli->error);
}
//read
if(isset($_GET['edit'])){
    $numid = $_GET['edit'];
    $atualizar = true;
    $resultado = $mysqli->query("SELECT * FROM excluir WHERE numid=$numid") or die($mysqli->error());

if ($resultado->num_rows){
    $linha = $resultado->fetch_array();
    $numid =$linha['numid'];
    $solicitante =$linha['solicitante'];
    $numchamado =$linha['numchamado'];
    $setor =$linha['setor'];
    $datareg =$linha['datareg'];
    $motivo =$linha['motivo'];
    $datacon =$linha['datacon'];
    }

}

//update

if(isset($_POST['upd'])){
    $numid =$_POST['numid'];
    $solicitante =$_POST['solicitante'];
    $numchamado =$_POST['numchamado'];
    $setor =$_POST['setor'];
    $datareg =$_POST['datareg'];
    $motivo =$_POST['motivo'];
    $datacon =$_POST['datacon'];

    $mysqli->query("UPDATE excluir SET solicitante='$solicitante',numchamado='$numchamado', setor='$setor' ,datareg='$datareg', motivo='$motivo',datacon='$datacon' WHERE numid=$numid")
    or die($mysqli->error);
    $_SESSION['mensagem'] = "Registro atualizado com sucesso";
    $_SESSION['tipomsg'] = 'warning';
    header("location: index3.php");

}





if (isset($_GET['delete'])){
    $numid = $_GET['delete'];
    $_SESSION['mensagem'] = "Registro deletado com sucesso";
    $_SESSION['tipomsg'] = 'danger';
        //retornar à pagina escolhida
        header("location: index3.php");

    $mysqli ->query("DELETE FROM excluir WHERE numid=$numid") or die($mysqli->error());
    
}   