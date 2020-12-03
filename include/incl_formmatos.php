<?php 
//ci-dessous un echo du formulaire de mise en vente qui sera utiliser via (include ou require).
echo   '<section class="paraghformmatos">
       <fieldset>
       <form action="#" method="post" enctype="multipart/form-data">

     	<div class="titrematos"><p><label for="titre">Titre :</label><input type="text" name="titre" id="titre" placeholder="titre" value=""></p></div><br/>


     	<div class="imagematos"><p><label for="image">Image :</label><input type="file" name="image" id="image" value=""></p></div><br/>

     	<div class="prixmatos"><p><label for="prix">Prix :</label><input type="number" name="prix" id="prix" value="0"></p></div><br/>


     	<div class="villematos"><p><label for="ville">Ville :</label><input type="text" name="ville" id="ville" placeholder="Nice" value=""></p></div><br/>

     	<div class="telmatos"><p><label for="tel">Tel :</label><input type="tel" name="tel" id="tel" placeholder="telephone" value=""></p></div><br/>

     	<div class="emailmatos"><p><label for="mail">Mail :</label><input type="email" name="mail" id="mail" placeholder="dupont@email.com" value=""></p></div><br/>

     	<div class="categoriematos"><p>Categorie :
     	<select name="select" id="table">
            <option selected="selected" value="1">Skate</option>
            <option value="2">Surf</option>
            <option value="3">Paddle</option>
            <option value="4">Snowboard</option>
     	</select></div></p><br/>

     	<div class="descriptionmatos"><p>Description :<textarea name="description" id="description" placeholder="description de mon produit" cols="70" rows="10"></textarea></p></div>

     	<div class="boutonForm">
            <input type="submit" class="boutonF1" name="submitmatos" id="boutonInscription" value="VALIDER">
            <input type="reset" class="boutonF2" id="boutonF2" name="reset" value="ANNULER">
        </div>

        </form>
        </fieldset>
        </section>';

 ?>