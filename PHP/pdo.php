<?php

$user = "pgtidal";
$passwd = "tidal";
$dsn = "pgsql:host=localhost;port=5432;dbname=acudb;";

try {
    $conn = new PDO($dsn,$user, $passwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(isset(($_POST['user']))){
        $sql1="SELECT * FROM login  WHERE  login.login = '".$_POST['user']."'";
        $sth1 = $conn->prepare( $sql1 );
        $sth1->execute();
        $data1=$sth1->fetch();
        if($data1['username']==""){
            $message="Erreur lors de la connexion.";
    
        }else{
    
            if($data1["motdepasse"]==$_POST['pwd']){
                $message="connexion réussie";
                $_SESSION['pseudo'] =$_POST['user'];
                header('Location: ./index.php?link=page_accueil.php'); 
            }
    
            else{
                $message="Erreur lors de la connexion.";
            }
        }
    }
    
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>