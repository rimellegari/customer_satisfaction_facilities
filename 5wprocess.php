<?php

session_start();
$atualizar = false;
$numid= 0;
$numchamado= '';
$what = ' ';
$why = ' ';
$onde = ' ';
$who = ' ';
$how = ' ';
$much = ' ';
$prazo = '';
$datacon = '';
$mysqli = new mysqli('localhost', 'root', '', 'cxdi') or die(mysqli_error($mysqli));

if(isset($_POST['add'] )){
$numid = $_POST['numid'];
$numchamado =$_POST['numchamado'];
$what = $_POST['what'];
$why = $_POST['why'];
$onde = $_POST['onde'];
$who = $_POST['who'];
$how = $_POST['how'];
$much = $_POST['much'];
$prazo = $_POST['prazo'];
$datacon = $_POST['datacon'];


$mysqli->query("INSERT INTO 5w2h (numchamado, what, why, onde, who, how, much, prazo, datacon) VALUES('$numchamado', '$what', '$why', '$onde', '$who', '$how', '$much', '$prazo', '$datacon')")
or die($mysqli->error);

$_SESSION['mensagem'] = "Plano de ação registrado com sucesso!";
$_SESSION['tipomsg'] = 'success';
header("location: index7.php");
}

if(isset($_GET['edit'])){
    $numid = $_GET['edit'];
    $atualizar = true;
    $resultado = $mysqli->query("SELECT * FROM 5w2h WHERE numid=$numid") or die($mysqli->error());

if ($resultado->num_rows){
    $linha = $resultado->fetch_array();
    $numid =$linha['numid'];
    $numchamado =$linha['numchamado'];
    $what = $linha['what'];
    $why = $linha['why'];
    $onde = $linha['onde'];
    $who = $linha['who'];
    $how = $linha['how'];
    $much = $linha['much'];
    $prazo = $linha['prazo'];
    $datacon = $linha['datacon'];
}
}

if(isset($_GET['delete'])){
    $numid = $_GET['delete'];
    $mysqli ->query("DELETE FROM 5w2h WHERE numid=$numid") or die($mysqli->error());
    $_SESSION['mensagem'] = "Plano de ação excluído com sucesso";
    $_SESSION['tipomsg'] = 'danger';
        //retornar à pagina escolhida
        header("location: index7.php");
}

//update

if(isset($_POST['upd'])){
    $numid = $_POST['numid'];
    $numchamado =$_POST['numchamado'];
    $what = $_POST['what'];
    $why = $_POST['why'];
    $onde = $_POST['onde'];
    $who = $_POST['who'];
    $how = $_POST['how'];
    $much = $_POST['much'];
    $prazo = $_POST['prazo'];
    $datacon = $_POST['datacon'];

    $mysqli->query("UPDATE 5w2h SET numchamado='$numchamado', what='$what' ,why='$why', onde='$onde', who='$who', how='$how', much='$much', prazo='$prazo', datacon='$datacon' WHERE numid=$numid")
    or die($mysqli->error);
    $_SESSION['mensagem'] = "Registro atualizado com sucesso";
    $_SESSION['tipomsg'] = 'warning';
    header("location: index7.php");
}