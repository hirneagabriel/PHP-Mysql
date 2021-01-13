<?php 
require_once('../config.php')?>
<?php
$errors=array();

if(isset($_POST['submit'])){
    function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LeVORAaAAAAALh8hExB9zCVyT3iihTrEJL4_Df2',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }
     
     $result = CheckCaptcha($_POST['g-recaptcha-response']);

    if ($result['success']) {

    //get form data
    $u=$_POST['u'];
    $p=$_POST['p'];
    $u = mysqli_real_escape_string($mysqli,$u);
    $p = mysqli_real_escape_string($mysqli,$p);
   $result =  mysqli_query($mysqli,"SELECT * FROM utilizator WHERE username='$u' AND statut=0");
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
     $_SESSION['adminID'] = $user['id_utilizator'];
     $_SESSION['adminUsername'] = $user['username'];
     header("Location: ../admin/admin.php");
    }else{
        array_push($errors, "Contul nu a fost inca verificat");
    }

   }
 }
 else{
        array_push($errors, "Date invalide!");
     }
    }
	
     else {
    
       echo '<script>alert("Va rugam confirmati ca nu sunteti un robot:)");</script>';
    }
 }
 
?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
 <title>Inregistrare</title>
      </head>
<body>
<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>

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
            <div class="g-recaptcha" align="center" style="padding: 10px;" data-sitekey="6LeVORAaAAAAABy44tWz96flzhczgVYv5gk03ZQ8"></div>
        </form>
          </div>
          
<?php include(ROOT_PATH . '/admin/includes/footer.php') ?>