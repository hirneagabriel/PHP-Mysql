<?php 
session_start();
require_once('config.php')?>
<?php require_once( ROOT_PATH . '/includes/functions.php') ?>

<?php $categorii = getCategorii(); 
      $oferte = getOferta();

?>

<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
 <title>Acasa</title>
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
      <?php foreach ($oferte as $oferta): ?>
        <a href="produs.php?id_produs=<?php echo $oferta['id_produs']?>">
            <div class="card">
           <img src="imagini/<?php echo $oferta['imagine']?>"  style="width:100%">
           <div class="container">
              <h3><?php echo $oferta['nume']?></h3> 
                <p>pret: <?php echo $oferta['pret']?> RON</p> 
           </div>
        </div>
        </a>
    <?php endforeach ?>
       
        
 </div>

     
</div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>