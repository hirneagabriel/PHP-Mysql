<?php 
session_start();
require_once('config.php');
require_once(ROOT_PATH . '/includes/functions.php')?>


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
         echo '<a href="utilizator.php">Cont</a>';
     }else{
         echo '<a href="registration.php">Inregistreaza-te</a> <a href="login.php">Log in</a>';
     }
     ?>
</div>
      
 <div class= "main">
     <?php
     if(isset($_SESSION["userID"])){
        echo '<table style=\"width: 100%\">
        <tr>
          <th>Nume client</th>
          <th>Telefon</th>
          <th>Email</th>
          <th>Adresa livrare</th>
          <th>Comanda</th>
          <th>Valoarea</th>
          <th>Status</th>
        </tr>';
         $comenzi=getComenzi($_SESSION["userID"]);
         foreach($comenzi as $comanda)
         {
            dateCom($comanda);
         }
         echo '</table>';
     }
     else{
         echo '<h3>Nu esti logat!</h3>';
     }
     ?>
         
 </div>

     
</div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>