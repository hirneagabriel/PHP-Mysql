<?php 
session_start();
require_once('../config.php');
?>
<?php
     if(!isset($_SESSION["adminID"])){
        header('location:index.php');
     }
     ?>

<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
 <title>Meniu</title>
      </head>
<body>
<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
<div class="grup">
 <div class="coloana">
     <?php
     if(isset($_SESSION['adminID'])){
         echo '<a href="logout.php">Logout</a>';
     }
     ?>
</div>
      
 <div class= "main">
     
     <a href="categorie.php">
              <input type="submit" value="Categorii" />
           </a>
           <a href="produse.php">
              <input type="submit" value="Produse" />
           </a>
           <a href="comanda.php">
              <input type="submit" value="Comenzi" />
           </a>
           <a href="crearecont.php">
              <input type="submit" value="Creare cont admin" />
           </a>    
 </div>

     
</div>
          
<?php include(ROOT_PATH . '/admin/includes/footer.php') ?>