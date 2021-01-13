<?php require_once('../config.php');
session_start()?>
<?php
$errors=array();
if(!isset($_SESSION["adminID"])){
    header('location:index.php');
 }
if(isset($_POST['submit'])){
    //get form data
    if(isset($_POST['u'])&&isset($_POST['p'])&&isset($_POST['p2'])&&isset($_POST['e'])&&isset($_POST['pr'])&&isset($_POST['n'])&&isset($_POST['t'])&&isset($_POST['j'])&&isset($_POST['o'])&&isset($_POST['s'])&&isset($_POST['nr'])&&isset($_POST['c']))
    {$u=$_POST['u'];
    $p=$_POST['p'];
    $p2=$_POST['p2'];
    $e=$_POST['e'];
    $pr=$_POST['pr'];
    $n=$_POST['n'];
    $t=$_POST['t'];
    if(!preg_match('/^[0][0-9]{9}$/', $t)) {
        array_push($errors, "Numar telefon invalid");
    }
    $j=$_POST['j'];
    $o=$_POST['o'];
    $s=$_POST['s'];
    $nr=$_POST['nr'];
    $c=$_POST['c'];
    if(!preg_match('/^[0-9][0-9]{5}$/', $c)) {
        array_push($errors, "Cod postal invalid");
    }
}
    else {array_push($errors, "Nu ati completat toate tabelele!");}
    if(strlen($u)< 5){
        array_push($errors, "Username prea scurt (minim 5 caractere)");
    }elseif($p2!=$p){
        array_push($errors, "Parole diferite");
    }else
    {
        $u = mysqli_real_escape_string($mysqli,$u);
        $p = mysqli_real_escape_string($mysqli,$p);
        $p2 = mysqli_real_escape_string($mysqli,$p2);
        $e = mysqli_real_escape_string($mysqli,$e);
        $n = mysqli_real_escape_string($mysqli,$n);
        $pr = mysqli_real_escape_string($mysqli,$pr);
        $j = mysqli_real_escape_string($mysqli,$j);
        $o = mysqli_real_escape_string($mysqli,$o);
        $s = mysqli_real_escape_string($mysqli,$s);
        $nr = mysqli_real_escape_string($mysqli,$nr);
        $c = mysqli_real_escape_string($mysqli,$c);
        $st =0;
        $result = mysqli_query($mysqli,"SELECT * FROM utilizator WHERE username='$u' or mail='$e' LIMIT 1");
        $user=mysqli_fetch_assoc($result);
        if ($user) { 
			if ($user['username'] === $u) {
			  array_push($errors, "Username deja folosit");
			}
			if ($user['mail'] === $e) {
			  array_push($errors, "Email deja folosit");
            }
        }
        if(count($errors)==0)
        {
        $pH=password_hash($p,PASSWORD_DEFAULT);
        mysqli_query($mysqli,"INSERT into utilizator(username,password,nume,prenume,telefon,mail,judet,oras,strada,numar,cod_postal,statut,vkey,verificat)
        VALUES('$u','$pH','$n','$pr','$t','$e','$j','$o','$s','$nr','$c','$st','-',1)");
        header('location:admin.php');
        }
    }
}




?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
 <title>Inregistrare cont nou administrator</title>
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
          <h3>Creare cont admin</h3>
          <?php if (count($errors) > 0) : ?>
          <div>
  	      <?php foreach ($errors as $error) : ?>
  	        <p><?php echo $error ?></p>
  	       <?php endforeach ?>
             </div>
                 <?php endif ?>
        <form method="Post" action="">
            <table border="0" align="center" cellpadding="5">
                <tr> 
                    <td align="right">Nume utilizator:</td>
                    <td><input type="text" name="u" required/></td>
                </tr>
                <tr> 
                    <td align="right">Parola:</td>
                    <td><input type="password" name="p" required/></td>
                </tr>
                <tr> 
                    <td align="right">Repeta parola:</td>
                    <td><input type="password" name="p2" required/></td>
                </tr>
                <tr> 
                    <td align="right">Adresa Email:</td>
                    <td><input type="email" name="e" required/></td>
                </tr>
                <tr> 
                    <td align="right">Nume:</td>
                    <td><input type="text" name="n" required/></td>
                </tr>
                <tr> 
                    <td align="right">Prenume:</td>
                    <td><input type="text" name="pr" required/></td>
                </tr>
                <tr> 
                    <td align="right">Telefon:</td>
                    <td><input type="text" name="t" required/></td>
                </tr>
                <tr> 
                    <td align="right">Judet:</td>
                    <td><input type="text" name="j" required/></td>
                </tr>
                <tr> 
                    <td align="right">Oras:</td>
                    <td><input type="text" name="o" required/></td>
                </tr>
                <tr> 
                    <td align="right">Strada:</td>
                    <td><input type="text" name="s" required/></td>
                </tr>
                <tr> 
                    <td align="right">Numar:</td>
                    <td><input type="text" name="nr" required/></td>
                </tr>
                <tr> 
                    <td align="right">Cod postal:</td>
                    <td><input type="test" name="c" required/></td>
                </tr>
                <tr>
                 <td colspan="2" align="center"><input type="SUBMIT" name="submit" style="font-size:14px;" value="Inregistrare" required/></td>
                </tr>
            </table>
        </form>
          </div>
          
<?php include(ROOT_PATH . '/admin/includes/footer.php') ?>