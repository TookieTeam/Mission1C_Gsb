<?php
include("model/class.pdogsb.php");
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;
$pdo = PdoGsb::getPdoGsb();
	
if(!isset($_REQUEST['uc']))
     $uc = 'controller';
else
	$uc = $_REQUEST['uc'];

switch($uc)
{
	case 'controller':
		{include("controleur/c_periode.php");break;}

	
		

}
include("vues/v_pied.php") ;



    