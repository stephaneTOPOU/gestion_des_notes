<?php 

$lib=$_POST["libelle"];
$nbcredit=$_POST["nbcredit"];
$enseignant=$_POST["enseignant"];


 

    $serveur = "localhost";
    $login= "root";

    try{
        $con= new PDO("mysql:host=$serveur;dbname=ges_note",$login);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $con->prepare('INSERT INTO matiere(libellemat,nbr_credi,idens) VALUES(:a,:b,:c)');
        $req->execute(array(
       
        'a' => $lib,
        'b' => $nbcredit,
        'c' => $enseignant,
        ));


        header('Location:matiere.php');

       
    }

    catch(PDOException $ex){
        echo 'Echec'.$ex->getMessage();

    } 
    
    
    ?>