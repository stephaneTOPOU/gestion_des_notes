<?php
$bdd = new PDO('mysql:host=localhost; dbname=ges_note','root','');
$z=$_POST['code'];
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];

echo"$z";
echo"$a";
echo"$b";
echo"$c";






if(isset($_POST['ok']))
{
	var_dump($_POST);

	$requette = "UPDATE matiere SET libellemat=$a,
	                               nbr_credi='$b',
	                               idens='$c'  WHERE codemat = $z";
	if($bdd->exec($requette))
	{
		header('Location:matiere.php');
	}
	else
	{
		echo"pas bien";
	}
}
  ?>





	
