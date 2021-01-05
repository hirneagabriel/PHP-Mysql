<?php 
session_start();
require_once('config.php')?>
<?php require_once( ROOT_PATH . '/includes/functions.php') ?>

<?php $categorii = getCategorii(); 
      if(isset($_GET['id_cat'])){
      $id_cat=$_GET['id_cat'];
      if(filter_var($id_cat,FILTER_VALIDATE_INT) === FALSE)
      {
         header('location:index.php');
      }
      else{
      $produse= getproduse($id_cat);
      }
      }

?>

<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
 <title>Produse</title>
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
      <?php foreach ($produse as $produs): ?>
        <a href="produs.php?id_produs=<?php echo $produs['id_produs']?>">
            <div class="card">
           <img src="imagini/<?php echo $produs['imagine']?>"  style="width:100%">
           <div class="container">
              <h4><?php echo $produs['nume']?></h4> 
                <p>pret: <?php echo $produs['pret']?> RON</p> 
           </div>
        </div>
        </a>
    <?php endforeach ?>
       
        
 </div>

     
</div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>