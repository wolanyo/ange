<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="#">changer mot de passe</a>
</div>

<div id="zonetexte">
<br /> <br /> <br /> <br />
    <form method="post" action="ajax.php" name="changephoto" enctype="multipart/form-data">
		<table class="tableformulaire">
			<tr>
				<td></td> <td> <p class="erreur" style="color: white;"></p></td>
			</tr>
			<tr>
				<td>Photo</td> <td> <input type="file" name="photo" required> 
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
					<input type="hidden" name="code" value="mph" />
				</td>
				<td>
					<button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
					<button id="btphoto" class="btn btn-success" type="submit" style="width: 100px;">
						<i class="icon-white icon-ok-sign"></i>Valider</button>
				</td>
			</tr>
		</table>
	</form>
</div>