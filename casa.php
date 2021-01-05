<?php 
session_start();
require_once('config.php')?>
<?php require_once( ROOT_PATH . '/includes/functions.php');
if (isset($_POST['confirmare'])){
$id_comanda = 1;
$query = "SELECT id_comanda FROM comanda";
$resursa = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_assoc($resursa)){
if ($id_comanda == $row['id_comanda']) $id_comanda=$id_comanda+1;}
$sql_comanda="INSERT INTO comanda (id_comanda,id_utilizator,valoare,data,confirmare) VALUES ('".$id_comanda."','".$_SESSION['userID']."','".$_SESSION['total']."', NOW() ,'0')";
$rez=mysqli_query($mysqli,$sql_comanda);
foreach ($_SESSION['cart'] as $key => $value){
    $sql_produs_comanda="INSERT INTO produs_comanda (id_comanda,id_produs,nr_produse) VALUES ('".$id_comanda."','".$value["product_id"]."','".$value['count']."')";
    $rez= mysqli_query($mysqli, $sql_produs_comanda);
}
echo "<script>alert('Comanda a fost trimisa !')</script>";
header('location:index.php');
session_destroy();
}

?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
 <title>Casa</title>
      </head>
<body>
<?php include(ROOT_PATH . '/includes/navbar.php') ?>

    <div class="grup">
      <div class="box">
          <h3>Casa</h3>
          <?php
 if(isset($_SESSION['userID'])){
    $u=$_SESSION['userID'];
    $cos=$_SESSION['cart'];
    $total=$_SESSION['total'];
    $result = mysqli_query($mysqli,"SELECT * FROM utilizator WHERE id_utilizator='$u'");
    $row_cnt = mysqli_num_rows($result);
 if($row_cnt!=0){
   $user=mysqli_fetch_assoc($result);
   dateComanda($user);
 }
 foreach ($_SESSION['cart'] as $key => $value){
    $product=getProdus($value["product_id"]);
     $count=$value["count"];
     dateProd($product['nume'],$product['pret'],$count);
 }
 echo "</table>
 <h3>Total de plata: " .$total. " RON
 <p>
 <form action=\"\" method=\"post\">
      <input type=\"submit\" name=\"confirmare\" value=\"Confirmare comanda\">
 </form>
 ";
 
 }else{
     echo 'Va rugam sa va logati!';
 }
 ?>
          </div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>