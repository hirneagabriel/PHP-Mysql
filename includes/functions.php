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

function elementeCos($productimg,$productname,$productprice,$productid,$cantitatea){
    $sum=$productprice*$cantitatea;
    $element="
    <form action=\"cos.php?id=$productid\" method=\"post\">
    <div class=\"layout-inline row\">
      <div class=\"col col-pro layout-inline\">
        <img src=\"imagini/$productimg\" alt=$productname >
        <p>$productname</p>
      </div>
      <div class=\"col col-price col-numeric align-center\">
        <p>$productprice RON</p>
      </div>
      <div class=\"col col-qty layout-inline\">
      <form action=\"\" method=\"post\">
      <select id=\"count\" name=\"cantitate\">
      <option value=\"1\">1</option>
      <option value=\"2\">2</option>
      <option value=\"3\">3</option>
      <option value=\"4\">4</option>
      </select>
      <input type=\"submit\" name=\"update\" value=\"Update\">
      </form>
    
      </div>
      <div class=\"col col-total col-numeric\">
          <p> $sum RON</p>
      </div>
      <button type=\"submit\" class=\"btn red\" name=\"remove\">Stergere</button>
    </div> 
</form> 
    ";
    echo $element;
}

function dateComanda($user){
  $element="
  <table style=\"width: 100%\">
  <tr>
    <th>Nume client</th>
    <th>Telefon</th>
    <th>Email</th>
    <th>Adresa livrare</th>
  </tr>
  <tr>
    <td>$user[nume] $user[prenume]</td>
    <td>$user[telefon]</td>
    <td>$user[mail]</td>
    <td>Strada $user[strada] nr. $user[numar] $user[oras], $user[judet], $user[cod_postal]</td>
  </tr>
  </table>
  <p>Doriti sa cumparati urmatoarele produse:</p>
  <table style=\"width: 100%\">
  <tr>
  <th>Produs</th>
  <th>Cantitate</th>
  <th>Pret pe buc.</th>
  <th>Pret</th>
  </tr>
  ";
  echo $element;
}
function dateProd($nume,$pret,$cantitatea){
  $sum=$cantitatea*$pret;
  $element="
  <tr>
  <td>$nume</td>
    <td>$cantitatea buc.</td>
    <td>$pret RON</td>
    <td>$sum RON</td>
  </tr>
  ";
  echo $element;
}

?>

