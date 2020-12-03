<?php 	
//ci-dessous un echo du formulaire d'inscription qui sera utiliser via (include ou require).
     echo '<section class="paraghform">
      <fieldset>
        <form action="" method="post" enctype="multipart/form-data">
                
                <div class="prenom">
                    <p><label for="prenom">Pseudo:</label>
                    <span class="asterix">*</span><input type="text" placeholder="Pseudo" length="28" id="prenom" class="prenom" name="pseudo" value=""></p>
                </div>
                <div class="mail">
                    <p><label for="mail">Mail:</label>
                    <span class="asterix">*</span><input type="text" placeholder="Email" length="28" id="mail" class="mail" name="email" value=""></p>
                </div>
                <div class="pass1">
                    <p><label for="pAss1">Pass:</label>
                    <span class="asterix">*</span><input type="password" placeholder="Password" id="pAss1" name="pass" value=""></p>
                </div>
                 
                <div class="boutonForm">
                    <input type="submit" class="boutonF1" name="submit" id="boutonInscription" value="VALIDER">
                    <input type="reset" class="boutonF2" id="boutonF2" name="reset" value="ANNULER">
                </div>
        </form>
      </fieldset>
  </section>     ';

 ?>
 