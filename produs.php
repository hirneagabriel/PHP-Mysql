<?php 
session_start();
require_once('config.php')?>
<?php require_once( ROOT_PATH . '/includes/functions.php') ?>
<?php $categorii = getCategorii(); 
      if(isset($_GET['id_produs'])){
      $id_produs=$_GET['id_produs'];
      if(filter_var($id_produs,FILTER_VALIDATE_INT) === FALSE)
      {
         header('location:index.php');
      }
      else{
      $produs = getprodus($id_produs);
      if(!$produs){
         header('location:index.php');
      }
      }
      }
?>
<?php
if (isset($_POST['add'])){
   $p=$_POST['product_id'];
   $p = mysqli_real_escape_string($mysqli,$p);
   $result =  mysqli_query($mysqli,"SELECT * FROM produs WHERE id_produs='$p'");
   $row_cnt =mysqli_num_rows($result);
 if($row_cnt!=0){
   if(isset($_SESSION['cart'])){

      $prod_array_id= array_column($_SESSION['cart'],"product_id");
      if(in_array($_POST['product_id'],$prod_array_id)){
         echo "<script>alert('Produs deja adaugat in cosul de cumparaturi!')</script>";
      }
      else{
         $count = count($_SESSION['cart']);
         $prod_array = array(
            'product_id' => $_POST['product_id'],
            'count' => 1
         );
         $_SESSION['cart'][$count] = $prod_array;
      }

  }else{

      $prod_array = array(
              'product_id' => $_POST['product_id'],
              'count' => 1
      );

      $_SESSION['cart'][0] = $prod_array;
  }
 }
}
?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
 <title><?php echo $produs['nume']?></title>
      </head>
<body>
<?php include(ROOT_PATH . '/includes/navbar.php') ?>
<div class="grup">
 <div class="coloana">

    <?php foreach ($categorii as $categorie): ?>
        <a href="categorie.php?id_cat=<?php echo $categorie['id_cat']?>"><?php echo $categorie['nume'] ?></a>
    <?php endforeach ?>
 </div>
      
 <div class= "main">
 <div>
 <form action="" method="post">
           <img src="imagini/<?php echo $produs['imagine']?>"  class="center">
              <h2 align="center"><?php echo $produs['nume']?></h2> 
              <h3> Descriere:</h3>
              <p><?php echo $produs['descriere']?></p>
              <p>stoc <?php echo $produs['stoc']?> buc.</p>
                <p align="center">pret: <?php echo $produs['pret']?> RON</p>
                <?php
                if($produs['stoc']!=0){
                  echo '<input type="SUBMIT" name="add" value="Adauga in cos" required/>';
                  echo '<input type=\'HIDDEN\' name=\'product_id\' value="'.$produs['id_produs'].'">';
                }
                else{
                   echo '<p>Produsul nu este in stoc';
                }
                ?> 
                
</form>
 </div>
 
</div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>