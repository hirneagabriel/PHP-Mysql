<?php 
session_start();
require_once('../config.php');
require_once(ROOT_PATH . '/admin/includes/functions.php')?>
<?php
    $errors=array();
     if(!isset($_SESSION["adminID"])){
        header('location:index.php');
     }
     
    $produse=getAllProduse();
    if (isset($_POST['remove'])){
        foreach ($produse as $produs){
            if($produs['id_produs']==$_GET['id']){
                $sql_comanda="DELETE FROM produs WHERE id_produs=$produs[id_produs]";
                $rez=mysqli_query($mysqli,$sql_comanda);
                header('location:produse.php');
            }
        }
    }
    if(isset($_FILES['img'])){
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_type = $_FILES['img']['type'];
        $file_ext=explode('.',$file_name);
        $file_ext=strtolower(end($file_ext));
        $n=$_POST['n'];
        $p=$_POST['p'];
        $i=$_POST['i'];
        $s=$_POST['s'];
        $o=$_POST['o'];
        $des=$_POST['desc'];
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152) {
           $errors[]='File size must be excately 2 MB';
        }
        $file_destination=ROOT_PATH ."/imagini/".$file_name;
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,$file_destination);
           $rez=mysqli_query($mysqli,"INSERT into produs(id_cat,nume,descriere,pret,stoc,oferta,imagine) VALUES('$i','$n','$des','$p','$s','$o','$file_name')");
           header("location: produse.php");
           //echo mysqli_error($mysqli);
           //echo $rez;
        }else{
           print_r($errors);
        }
     }

     ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
 <title>Produse</title>
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
    <th>Produs</th>
    <th>Pret</th>
    <th>Stoc</th>
    <th>Categorie</th>
    <th>Id img</th>
  </tr>
  
 <?php
 
  foreach ($produse as $produs){
        dateProduse($produs);
        
  }
    ?>
    </table> 
    <form method="Post" action="" enctype="multipart/form-data">
            <table border="0" style="float:left;"  cellpadding="5">
                <tr> 
                    <td align="right">Nume:</td>
                    <td><input type="text" name="n" required/></td>
                </tr>
                <tr> 
                    <td align="right">pret:</td>
                    <td><input type="number" name="p" required/></td>
                </tr>
                <tr> 
                    <td align="right">Id categorie:</td>
                    <td><input type="number" name="i" required/></td>
                </tr>
                <tr> 
                    <td align="right">Stoc:</td>
                    <td><input type="number" name="s" required/></td>
                </tr>
                <tr> 
                    <td align="right">Oferta:</td>
                    <td><input type="number" name="o" required/></td>
                </tr>
                <tr> 
                    <td align="right">Imagine:</td>
                    <td><input type="file" name="img" /></td>
                </tr>
                <tr> 
                    <td align="right">Descriere:</td>
                    <td><textarea  name="desc" rows="4" cols="50"></textarea></td>
                </tr>
                
                <tr>
                 <td colspan="2" align="center"><input type="SUBMIT" name="submit" style="font-size:14px;" value="Introdu produs nou" required/></td>
                </tr>
            </table>
        </form>
        
 </div>

     
</div>
          
<?php include(ROOT_PATH . '/admin/includes/footer.php') ?>