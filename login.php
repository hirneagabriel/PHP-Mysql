<?php require_once('config.php')?>
<?php
$errors=array();

if(isset($_POST['submit'])){

    //get form data
    $u=$_POST['u'];
    $p=$_POST['p'];
    $u = mysqli_real_escape_string($mysqli,$u);
    $p = mysqli_real_escape_string($mysqli,$p);
   $result =  mysqli_query($mysqli,"SELECT * FROM utilizator WHERE username='$u'");
   $row_cnt =mysqli_num_rows($result);
 if($row_cnt!=0){
   $user=mysqli_fetch_assoc($result);
   $pH=$user["password"];
   $checkPwd = password_verify($p,$pH);
   if($checkPwd === false){
    array_push($errors, "Date invalide!");
   }
   else{
    $verified=$user['verificat'];
    if($verified==1)
    {
     session_start();
     $_SESSION['userID'] = $user['id_utilizator'];
     $_SESSION['username'] = $user['username'];
     header("Location: ../utilizator.php");
    }else{
        array_push($errors, "Contul nu a fost inca verificat");
    }

   }
 }
 else{
        array_push($errors, "Date invalide!");
     }
 }
 
?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
 <title>Inregistrare</title>
      </head>
<body>
<?php include(ROOT_PATH . '/includes/navbar.php') ?>

    <div class="grup">
      <div class="box">
          <h3>Log In</h3>
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
                 <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="Login" required/></td>
                </tr>
            </table>
        </form>
          </div>
          
<?php include(ROOT_PATH . '/includes/footer.php') ?>