<?php 

$a=$_POST["matiere"];
$b=$_POST["responsable"];
$c=$_POST["semestre"];
$d=$_POST["date_pro"];



 

    $serveur = "localhost";
    $login= "root";

    try{
        $con= new PDO("mysql:host=$serveur;dbname=ges_note",$login);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $con->prepare('INSERT INTO programmer(codemat,idres,idsem,date_pro) VALUES(:a,:b,:c,:d)');
        $req->execute(array(
       
        'a' => $a,
        'b' => $b,
        'c' => $c,
        'd' => $d,
        ));


       
        header('Location:repartition.php');

       
    }

    catch(PDOException $ex){
        echo 'Echec'.$ex->getMessage();

    } 
    
    
    ?>