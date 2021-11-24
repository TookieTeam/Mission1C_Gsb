<div class="page">
            <div class="containerLogo"><a href="index.php"><img src="img/logo.png"  alt="" ></a></div>
            <div class="containerPage"><h1>Suivi des cumuls de tous les frais par moi</h1>
                
                <form method="POST" action="index.php?uc=controller&action=valider">
                    <h2>Periode</h2>
                    <div class="inputContainer">
                    <label for="mois/annee">Mois/Année :  </label>
                    
                    <select name="date" id="choice" size="1">
                      <?php foreach($mois as $unmois):?>
                        <option value="<?php echo $unmois['mois']?>"><?php echo $unmois['mois'] ?> </option>
                        <?php endforeach?>
                      </select>

                         <input type="submit" name="Submit" id="buttom" value="Envoyer">                   


                    </div>
                    <h2>Cumul pour tous les visiteurs des frais au forfait par poste</h2>
                 <table>
                     <thead>
                          <tr>
                           <th>Repas midi</th>
                           <th>Nuitée</th>
                           <th>Etape</th>
                           <th>km</th>
                         </tr>

                    
                         <tr>
                          <?php if(isset($result)):?>
                        <?php foreach($result as $k=>$id):?>

                           <td><?php if(isset($id)):echo $id[0][0];else: echo " ";endif;?></td>
                         <?php endforeach?>
                         <?php else:echo " ";endif; ?>
                           </tr>
                         
                  </thead>
                    
                </table>
                </form>
            </div>
        </div>