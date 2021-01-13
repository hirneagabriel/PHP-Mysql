<?php 
session_start();
require_once('../config.php');
require_once(ROOT_PATH . '/admin/includes/functions.php')?>
<?php
     if(!isset($_SESSION["adminID"])){
        header('location:index.php');
     }
     $comenzi= getComenzi();
     if (isset($_POST['confirmare'])){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        if(filter_var($id,FILTER_VALIDATE_INT) === FALSE)
        {
           header('location:admin.php');
        }
        else{
            $result =  mysqli_query($mysqli,"SELECT * FROM comanda WHERE id_comanda='$id'");
            $row_cnt =mysqli_num_rows($result);
            if($row_cnt!=0){
                $comanda=getComanda($id);
                $user=getUserComanda($comanda['id_utilizator']);
                require_once __DIR__ . '/mpdf/vendor/autoload.php';
                $produse=getProduseComanda($id);
                $mpdf= new \Mpdf\Mpdf();
                $data='';
                $data.='<h1>Facutra</h1>';
                $data.='<strong>Nume </strong>'.$user['nume'].'<br/>';
                $data.='<strong>Prenume </strong>'.$user['prenume'].'<br/>';
                $data.='<strong>Telefon </strong>'.$user['telefon'].'<br/>';
                $data.='<strong>Email </strong>'.$user['mail'].'<br/>';
                $data.='<strong>Comanda </strong>'.$comanda['id_comanda'].'<br/>';
                
                $data.='<p>Comanda dumneavoastra a fost confirmata. Comanda contine urmatoarele produse:</p>';
                $data.='<table>
                      <tr>
                        <th>Produs</th>
                        <th>Cantiate</th>
                        <th>Pret pe buc.</th>
                        <th>Pret</th>
                        </tr>';
                foreach($produse as $produs){
                    $prod=getProdus($produs['id_produs']);
                    $sum=$prod['pret']*$produs['nr_produse'];
                    $data.='<tr>
                        <th>'.$prod['nume'].'</th>
                        <th>'.$produs['nr_produse'].' buc.</th>
                        <th>'.$prod['pret'].' RON</th>
                        <th>'.$sum.' RON</th>
                        </tr>';
                }
                $data.='</table>
                <h3>Total de plata: '.$comanda['valoare'].' RON</h3';
                $mpdf->WriteHTML($data);
                $content = $mpdf->Output('', 'S');

                $content = chunk_split(base64_encode($content));
                $mailto = $user['mail']; //Mailto here
                $from_name = 'Electronice'; //Name of sender mail
                $from_mail = 'admin@electronice.ro'; //Mailfrom here
                $subject = 'Cofirmare comanda'; 
                $message = 'Comanda dumenavoastra a fost confirmata. Gasiti atasat factura.';
                $filename = "factura".date("d-m-Y_H-i",time()).".pdf"; //Your Filename with local date and time
                
                //Headers of PDF and e-mail
                $boundary = "XYZ-" . date("dmYis") . "-ZYX"; 
                
                $header = "--$boundary\r\n"; 
                $header .= "Content-Transfer-Encoding: 8bits\r\n"; 
                $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n\r\n"; // or utf-8
                $header .= "$message\r\n";
                $header .= "--$boundary\r\n";
                $header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
                $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n";
                $header .= "Content-Transfer-Encoding: base64\r\n\r\n";
                $header .= "$content\r\n"; 
                $header .= "--$boundary--\r\n";
                
                $header2 = "MIME-Version: 1.0\r\n";
                $header2 .= "From: ".$from_name." \r\n"; 
                $header2 .= "Return-Path: $from_mail\r\n";
                $header2 .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
                $header2 .= "$boundary\r\n";
                
                mail($mailto,$subject,$header,$header2, "-r".$from_mail);
                
                $sql_comanda="UPDATE comanda SET confirmare=1 WHERE id_comanda='$id'";
                $rez=mysqli_query($mysqli,$sql_comanda);
                header('location:comanda.php');
            }
        }
     }
    }
     ?>
<?php require_once(ROOT_PATH . '/admin/includes/head_section.php') ?>
 <title>Comenzi</title>
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
 <table style=\"width: 100%\">
  <tr>
    <th>Nume client</th>
    <th>Telefon</th>
    <th>Email</th>
    <th>Adresa livrare</th>
    <th>Comanda</th>
    <th>Valoarea</th>
    <th>Status</th>
    <th>Data</th>
  </tr>
 <?php
 
  foreach ($comenzi as $comanda){
        dateCom($comanda);
        if($comanda['confirmare']==0){
            echo '<td><button type="submit" class="btn red" name="confirmare">Confirmare</button></td>
            </tr>
            </form>';
        }
        else{
            echo '
            </tr>
            </form>';
        }
  }
    ?>
    </table> 
 </div>

     
</div>
          
<?php include(ROOT_PATH . '/admin/includes/footer.php') ?>