<?php $act = $_SESSION['page']; ?>

<div id="sousgauche">
                        <div class="menugauche">
                            <ul>
                                <li id="titre"> <a href="#" style="color: white;">Menu</a></li>                           
                                <li <?php if($act=="accueil") echo 'id="active"'; ?> ><a href="principale.php?page=accueil">Accueil</a></li>
                                <li <?php if($act=="listecourrier") echo 'id="active"'; ?> ><a href="principale.php?page=listecourrier&amp;numpage=1">Liste des courriers</a></li>
                                <li <?php if($act=="ajoutercourrier") echo 'id="active"'; ?> ><a href="principale.php?page=ajoutercourrier">Enregistrer un courrier</a></li>
                                <li <?php if($act=="archives") echo 'id="active"'; ?> ><a href="principale.php?page=archives">Archives</a></li>
                                <li <?php if($act=="password") echo 'id="active"'; ?> ><a href="principale.php?page=password">Changer mot de passe</a></li>
                                <li <?php if($act=="photo") echo 'id="active"'; ?> ><a href="principale.php?page=photo">Changer la photo</a></li>
                                <li><a href="traitement.php?code=deconnexion">Deconnexion</a></li>
                            </ul>
                        </div>                
                    </div>