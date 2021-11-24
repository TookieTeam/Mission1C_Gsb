 <?php
 


 if(!isset($_REQUEST['action']))
 $action = 'accueil';
else
$action = $_REQUEST['action'];

switch($action)
{
   case 'accueil':
   {
      $mois = $pdo->getMois();
      include("vues/v_periode.php");
      break;
   }

   case 'valider':
      {
         $mois = $pdo->getMois();
         $date = $_REQUEST['date'];
         $idF = ["KM","REP","NUI","ETP"];
         // $etape = $pdo->getEtape($date);
         // $km = $pdo->getKm($date);
         $i =0;
         foreach($idF as $id)
         {
         $result[$i] = $pdo->getFrais($date,$id);
         $i++;
         }
         // $rep = $pdo->getRep($date);

         include("vues/v_periode.php");
         break;
      }





}


