<?php 
//ci-dessous un echo du formulaire de contact qui sera utiliser via (include ou require).
     echo '<section class="paraghform">
      <fieldset>
        <form action="traitementcontact.php" method="post">
                <div class="mail">
                    <p><label for="mail">Mail:</label>
                    <span class="asterix">*</span><input type="text" placeholder="Votre mail" length="28" id="mail" class="mail" name="email" value=""></p>
                </div>
                
                <div class="prenom">
                    <p><label for="prenom">Pseudo:</label>
                    <span class="asterix">*</span><input type="text" placeholder="pseudo" length="28" id="prenom" class="prenom" name="pseudo" value=""></p>
                </div>
                <div class="commentaireForm">
                    <p><label for="commentaireForm">Commentaires:</label>
                    <textarea class="commentaireForm" id="commentaireForm" cols="20" rows="6" name="message" type="text" placeholder="Observation:" value=""></textarea></p>
                </div>
                <div class="boutonForm">
                    <input type="submit" class="boutonF1" id="boutonContact" name="submitContact" value="VALIDER">
                    <input type="reset" class="boutonF2" id="boutonF2" name="reset" value="ANNULER">
                </div>
        </form>
      </fieldset>
  </section>     ';

 ?>