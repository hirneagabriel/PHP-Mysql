<?php 
session_start();
require_once('config.php')?>


<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
 <title>Cont utilizator</title>
      </head>
<body>
<?php include(ROOT_PATH . '/includes/navbar.php') ?>
<div class="grup">
 <div class="coloana">
     <?php
     if(isset($_SESSION['userID'])){
         echo '<a href="logout.php">Logout</a>';
     }else{
         echo '<a href="registration.php">Inregistreaza-te</a> <a href="login.php">Log in</a>';
     }
     ?>
</div>
      
 <div class= "main">
     <?php
     if(isset($_SESSION["userID"])){
         echo '<h3>Esti logat!</h3>';
     }
     else{
         echo '<h3>Nu esti logat!</h3>';
     }
     ?>
         
 </div>

     
</div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>