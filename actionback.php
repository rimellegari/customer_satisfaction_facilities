<?php
    include 'connect.php';

    if(isset($_POST['add'])){
        $numid =$_POST['numid'];
        $datarec =$_POST['datarec'];
        $datareg =$_POST['datareg'];
        $tipo =$_POST['tipo'];
        $origem =$_POST['origem'];
        $rastrfonte =$_POST['rastrfonte'];
        $escopo =$_POST['escopo'];
        $setor =$_POST['setor'];
        $unidade =$_POST['unidade'];
        $area =$_POST['area'];
        $perfil =$_POST['perfil'];
        $grteor =$_POST['grteor'];
        $voc=$_POST['voc'];
        $resposta=$_POST['resposta'];
        $dataresp =$_POST['dataresp'];

    $query = "INSERT INTO manifest(numid,datarec,datareg,tipo,origem,rastrfonte,escopo,setor,unidade,area,perfil,grteor,voc,resposta,dataresp)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param('sssssssssssssss', $numid, $datarec, $datareg, $tipo, $origem, $rastrfonte, $escopo, $setor, $unidade, $area, $perfil, $grteor, $voc, $resposta, $dataresp);
    $stmt->execute();
    }
?>