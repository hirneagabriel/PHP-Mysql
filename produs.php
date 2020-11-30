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
           <img src="imagini/<?php echo $produs['imagine']?>"  class="center">
              <h2 align="center"><?php echo $produs['nume']?></h2> 
              <h3> Descriere:</h3>
              <p><?php echo $produs['descriere']?></p>
                <p align="center">pret: <?php echo $produs['pret']?> RON</p> 
                <input type="SUBMIT" name="submit" value="Adauga in cos" required/>
 </div>
</div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>