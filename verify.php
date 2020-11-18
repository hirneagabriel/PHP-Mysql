<?php require_once('config.php')?>
<?php
if(isset($_GET['vkey'])){
    $vkey=$_GET['vkey'];
    $resultSet=$mysqli->query("SELECT verificat,vkey FROM utilizator WHERE verificat= 0 and vkey='$vkey'");
    if($resultSet->num_rows ==1)
    {
        $update=$mysqli->query("UPDATE utilizator set verificat =1 WHERE vkey ='$vkey'");
        if($update){
            echo "Contul tau a fost verificat.Poti sa te logezi";
        }
        else{
            echo $mysqli->error;
        }
    }else{
        echo "Contul e invalid sau deja verificat";
    }
}
else{
    die("Ceva nu a mers bine");
}
?>

<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
</head>
<body>
<center>
</center>
</body>
</html>