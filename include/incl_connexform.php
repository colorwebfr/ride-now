<?php 
//ci-dessous un echo du formulaire de connection qui sera utiliser via (include ou require).
     echo '<section class="paraghform">
      <fieldset>
        <form action="#" method="post">
                 <div class="prenom">
                    <p><label for="prenomConn">Pseudo:</label>
                    <span class="asterix">*</span><input type="text" placeholder="Pseudo" length="28" id="prenomConn" class="prenom" name="pseudo" value=""></p>
                </div>
                <div class="mail">
                    <p><label for="mailConn">Mail:</label>
                    <span class="asterix">*</span><input type="text" placeholder="Email" length="28" id="mailConn" class="mail" name="email" value=""></p>
                </div>
                <div class="pass1">
                    <p><label for="pAss1Conn">Pass:</label>
                    <span class="asterix">*</span><input type="password" placeholder="Password" id="pAss1Conn" name="pass" value=""></p>
                </div>          
                <div class="boutonForm">
                    <input type="submit" name="submitconnex" class="boutonF1" id="boutonConnexion" value="VALIDER">
                    <input type="reset" class="boutonF2" id="boutonF2" name="reset" value="ANNULER">
                </div>
        </form>
      </fieldset>
  </section>     ';

 ?>