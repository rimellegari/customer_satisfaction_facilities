<?php
    session_start();
    //conexao database
    $mysqli = new mysqli('localhost', 'root', '', 'cxdi') or die(mysqli_error($mysqli));
    $id = 0;
    $update = false;
    $numid= '';
    $datarec= '';
    $datareg= '';
    $tipo= ' ';
    $origem= ' ';
    $rastrfonte= '';
    $escopo= ' ';
    $setor= ' ';
    $unidade= ' ';
    $area= '';
    $perfil= ' ';
    $nomecli= '';
    $grteor= ' ';
    $voc= ' ';
    $resposta= ' ';
    $dataresp= '';
//add uma manif
if (isset($_POST['add'])) {
    $numid =$_POST['numid'];
    $datarec =$_POST['datarec'];
    $datareg =$_POST['datareg'];
    $tipo =$_POST['tipo'];
    $origem =$_POST['origem'];
    $rastrfonte =$_POST['rastrfonte'];
    $escopo =$_POST['escopo'];
    $setor =$_POST['setor'];
    $unidade = $_POST['unidade'];
    $area =$_POST['area'];
    $perfil =$_POST['perfil'];
    $nomecli =$_POST['nomecli'];
    $grteor =$_POST['grteor'];
    $voc=$_POST['voc'];
    $resposta=$_POST['resposta'];
    $dataresp =$_POST['dataresp'];

    $mysqli->query("INSERT INTO manifest (numid,datarec,datareg,tipo,origem,rastrfonte,escopo,setor,unidade,area,perfil,nomecli,grteor,voc,resposta,dataresp) VALUES('$numid', '$datarec', '$datareg', '$tipo', '$origem', '$rastrfonte', '$escopo', '$setor', '$unidade', '$area', '$perfil', '$nomecli', '$grteor', '$voc', '$resposta', '$dataresp')") or
            die($mysqli->error);
            $_SESSION['message'] = "Manifestação resgistrada";
            $_SESSION['msg-type'] = "success";
            header("location: index.php");
}
//carregar dados p edit
if (isset($_GET['edit'])){
    $numid = $_GET['edit'];
    $update = true;
    $resultado = $mysqli->query("SELECT * FROM manifest WHERE numid= $numid") or die($mysqli->error());
    if ($resultado->num_rows){
        $linha=$resultado->fetch_array();
        $numid=$linha['numid'];
        $datarec=$linha['datarec'];
        $datareg=$linha['datareg'];
        $tipo=$linha['tipo'];
        $origem=$linha['origem'];
        $rastrfonte=$linha['rastrfonte'];
        $escopo=$linha['escopo'];
        $setor=$linha['setor'];
        $unidade=$linha['unidade'];
        $area=$linha['area'];
        $perfil=$linha['perfil'];
        $grteor=$linha['grteor'];
        $voc=$linha['voc'];
        $resposta=$linha['resposta'];
        $dataresp=$linha['dataresp'];
    }
}
//update

if (isset($_POST['update'])){
    $id= $_POST['id'];
    $numid =$_POST['numid'];
    $datarec =$_POST['datarec'];
    $datareg =$_POST['datareg'];
    $tipo =$_POST['tipo'];
    $origem =$_POST['origem'];
    $rastrfonte =$_POST['rastrfonte'];
    $escopo =$_POST['escopo'];
    $setor =$_POST['setor'];
    $unidade = $_POST['unidade'];
    $area =$_POST['area'];
    $perfil =$_POST['perfil'];
    $grteor =$_POST['grteor'];
    $voc=$_POST['voc'];
    $resposta=$_POST['resposta'];
    $dataresp =$_POST['dataresp'];

    $mysqli->query("UPDATE manifest SET numid='$numid', datarec='$datarec', datareg='$datareg', tipo='$tipo', origem='$origem', rastrfonte='$rastrfonte', escopo='$escopo', setor='$setor', unidade='$unidade', area='$area', perfil='$perfil', grteor='$grteor', voc='$voc', resposta='$resposta', dataresp='$dataresp' WHERE numid=$numid") or
    die($mysqli->error);
    $_SESSION['message'] = "Manifestação atualizada com sucesso";
    $_SESSION['msg-type'] = "warning";
    header("location: index.php");
}
