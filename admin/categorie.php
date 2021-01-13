<?php 
session_start();
require_once('../config.php');
require_once(ROOT_PATH . '/admin/includes/functions.php')?>
<?php
    $errors=array();
     if(!isset($_SESSION["adminID"])){
        header('location:index.php');
     }
     
    $categorii=getCategorii();
    if (isset($_POST['remove'])){
        foreach ($categorii as $categorie){
            if($categorie['id_cat']==$_GET['id']){
                $sql_comanda="DELETE FROM categorie WHERE id_cat =$categorie[id_cat]";
                $rez=mysqli_query($mysqli,$sql_comanda);
                echo $rez;
                header('location:categorie.php');
            }
        }
    }
    if(isset($_POST['submit'])){

        $c=$_POST['c'];
        $c = mysqli_real_escape_string($mysqli,$c);
   $result =  mysqli_query($mysqli,"SELECT * FROM categorie WHERE lower(nume)=lower('$c')");
   $row_cnt =mysqli_num_rows($result);
 if($row_cnt==0){
    mysqli_query($mysqli,"INSERT into categorie(nume) VALUES('$c')");
    header('location:categorie.php');
 }
else{
    array_push($errors, "Categoria deja exista");
}
}

     ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
 <title>Categorii</title>
      </head>
<body>
<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
<div class="grup">
 <div class="coloana">
     <?php
     if(isset($_SESSION['adminID'])){
         echo '<a href="admin.php">Meniu principal</a>';
     }
     ?>
</div>
      
 <div class= "main">
 <?php foreach ($errors as $error) : ?>
  	        <p><?php echo $error ?></p>
  	       <?php endforeach ?>
 <table style="float:left; padding:14px; margin-right:14px;">
  <tr>
    <th>Categorie</th>
  </tr>
  
 <?php
 
  foreach ($categorii as $categorie){
        dateCat($categorie);
        
  }
    ?>
    </table> 
    <form method="Post" action="">
            <table border="0" style="float:left;"  cellpadding="5">
                <tr> 
                    <td align="right">Categorie noua:</td>
                    <td><input type="text" name="c" required/></td>
                </tr>
                <tr>
                 <td colspan="2" align="center"><input type="SUBMIT" name="submit" style="font-size:14px;" value="Introduce categorie noua" required/></td>
                </tr>
            </table>
        </form>

 </div>

     
</div>
          
<?php include(ROOT_PATH . '/admin/includes/footer.php') ?>