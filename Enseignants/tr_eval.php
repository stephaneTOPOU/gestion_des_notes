<?php 

$a=$_POST["date_eval"];
$b=$_POST["matiere"];
$c=$_POST["session"];
$d=$_POST["semestre"];


 

    $serveur = "localhost";
    $login= "root";

    try{
        $con= new PDO("mysql:host=$serveur;dbname=ges_note",$login);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $con->prepare('INSERT INTO evaluation(date_eval,codemat,idsess,idsem) VALUES(:a,:b,:c,:d)');
        $req->execute(array(
       
        'a' => $a,
        'b' => $b,
        'c' => $c,
        'd' => $d,
        ));


      
        header('Location:evaluation.php');

       
    }

    catch(PDOException $ex){
        echo 'Echec'.$ex->getMessage();

    } 
    
    
    ?>