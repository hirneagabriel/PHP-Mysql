<?php
function getCategorii(){
    global $mysqli;
    $sql= "SELECT id_cat,nume FROM categorie";
    $result=mysqli_query($mysqli,$sql);
    $categorie= mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categorie;
}

function getOferta()
{
    global $mysqli;
    $sql= "SELECT * FROM produs where oferta = 1";
    $result=mysqli_query($mysqli,$sql);
    $oferte= mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $oferte;
}

function getProduse($id_cat)
{
    global $mysqli;
    $sql= "SELECT * FROM produs where id_cat=$id_cat";
    $result=mysqli_query($mysqli,$sql);
    $produse= mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $produse;
}

function getProdus($id_produs)
{
    global $mysqli;
    $sql= "SELECT * FROM produs where id_produs=$id_produs";
    $result=mysqli_query($mysqli,$sql);
    $produs= mysqli_fetch_assoc($result);
    return $produs;
}

?>