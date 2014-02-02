<?php $act = $_SESSION['page']; ?>

<div id="sousgauche">
	<div class="menugauche">
	    <ul>
	        <li id="titre"> <a href="#" style="color: white;">Menu</a></li>                
            <li <?php if($act=="accueil") echo 'id="active"'; ?> ><a href="principale.php?page=accueil">Accueil</a></li>
            <li <?php if($act=="listeuser") echo 'id="active"'; ?> ><a href="principale.php?page=listeuser&amp;numpage=1">Liste des utilisateurs</a></li>
            <li <?php if($act=="inscription") echo 'id="active"'; ?> ><a href="principale.php?page=inscription">Cr&eacute;er un utilisateur</a></li>
            <li <?php if($act=="listecourrier") echo 'id="active"'; ?> ><a href="principale.php?page=listecourrier">Liste des courriers</a></li>
            <li <?php if($act=="ajoutercourrier") echo 'id="active"'; ?> ><a href="principale.php?page=ajoutercourrier">Enregistrer un courrier</a></li>
			<li <?php if($act=="archives") echo 'id="active"'; ?> ><a href="principale.php?page=archives">Archives</a></li>
			<li <?php if($act=="password") echo 'id="active"'; ?> ><a href="principale.php?page=password">Changer mot de passe</a></li>
			<li <?php if($act=="photo") echo 'id="active"'; ?> ><a href="principale.php?page=photo">Changer la photo</a></li>
                                <!--li <?php //if($act=="parametres") echo 'id="active"'; ?> ><a href="principale.php?page=parametres">Param&egrave;tres</a></li-->
			<li><a href="traitement.php?code=deconnexion">Deconnexion</a></li>
		</ul>
	</div>                
</div>
