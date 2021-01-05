<?php 
session_start();
require_once('config.php')?>
<?php require_once( ROOT_PATH . '/includes/functions.php');
if (isset($_POST['remove'])){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              $_SESSION['cart'] = array_values($_SESSION['cart']);
          }
        }
      }
if (isset($_POST['update'])){
  foreach ($_SESSION['cart'] as $key => $value){
    if($value["product_id"] == $_GET['id']){
      $_SESSION['cart'][$key]['count']=$_POST['cantitate'];
    }
}
}

?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
<link rel="stylesheet" href="coss.css">
 <title>Cos de cumparaturi</title>
      </head>
<body>
<?php include(ROOT_PATH . '/includes/navbar.php') ?>
<div class="grup">
 
     <div class="table">
      
     <?php
     if(isset($_SESSION['cart'])){
      $count = count($_SESSION['cart']);
      if($count>0){
        require_once(ROOT_PATH . '/includes/cos1.php');
      $product_id=array_column($_SESSION['cart'], 'product_id');
      $total=0;
      foreach ($_SESSION['cart'] as $key => $value){
      
        $product=getProdus($value["product_id"]);
        elementeCos($product['imagine'],$product['nume'],$product['pret'],$product['id_produs'],$value["count"]);
        $total=$total+$value["count"]*$product["pret"];
      }
      $_SESSION['total']=$total+15;
      require_once(ROOT_PATH . '/includes/cos2.php');
    }
    else{
      echo "<h3>Cosul este gol..</h3>";
    }
     }
     else{
       echo "<h3>Cosul este gol..</h3>";
     }
     
     
     ?>
      
    
</div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>