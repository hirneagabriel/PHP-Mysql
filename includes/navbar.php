<div class="header">
        <h1>Electronice</h1>
        <h2>Tot ce iti doresti</h2>
      </div>
      <nav class="navbar">
        <a href="index.php">Acasa</a>
        <a href="utilizator.php">Cont utilizator</a>
        <a href="cos.php">Cos de cumparaturi
        <?php
        if(isset($_SESSION['cart'])){
          $count = count($_SESSION['cart']);
          echo "<span style=\"font-weight:bold; color:red;\">$count</span>";
        }else{
          echo "<span style=\"font-weight:bold; color:red;\" > 0 </span>";
        }
         ?></a>
        <a href="about.php" class="right">About us</a>
      </nav>