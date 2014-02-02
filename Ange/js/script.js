$(function() {
    
    //formulaire de connexion a l'application
    
    $('form[name="connexion"]').submit(function(){
        return false;
    });
    //bouton d'envoi de connexion su le page d'accueil
    $('#btconnexion').click(function(){
        $.post(
               'ajax.php', {
                        pseudo : $('input[name="pseudo"]').val(),
                        passwd : $('input[name="passwd"]').val(),
                        code : 'cn'
                    }, function(reponseTexte){
                    var connexionOk = reponseTexte ;
                    if( connexionOk == 1){
                        window.location = 'principale.php?page=accueil' ;
                    }
                    else{
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').show("slow").delay(4000).hide("slow");
                        $('input[name="passwd').attr('value', '');
                        
                        //alert( reponseTexte) ;
                    }
               }
        );
    });
    
    $('form[name="ajoutercourrier"]').submit(function(){
        return false;
    });
    
    //enregistrer un courrier
    
    $('#btvalidercourrier').click(function(){
        if( $('input[name="codecourrier"]').val() == '' || $('input[name="datearriver"]').val() == '' || $('input[name="expediteur"]').val() == '' ||
            $('textarea[name="objet"]').val() == '' || $('input[name="dateretour"]').val() == '' ){
            $('.erreur').css('display', 'block') ;
            $('.erreur').css('background-color', '#C00000') ;
            $('.erreur').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php', {
                    idc : $('input[name="codecourrier"]').val(),
                    datearr : $('input[name="datearriver"]').val(),
                    exp : $('input[name="expediteur"]').val(),
                    objet : $('textarea[name="objet"]').val(),
                    dateretour : $('input[name="dateretour"]').val(),
                    code : 'ac' }, function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    if( codeExiste == 0){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Ce numero de courrier existe d&eacute;j&acirc;') ;
                        $('input[name="codecourrier"]').attr('value','');
                    }
                    else if( codeExiste == 1){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', 'green') ;
                        $('.erreur').html('Enregistrement &eacute;ffectu&eacute;') ;
                        $('input[type="text"]').attr('value','');
						$('input[name="dateretour"]').attr('value','Aucune date');
                        $('textarea[name="objet"]').attr('value','');
                    }
                    else{
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Erreur de parametre') ;
                        alert(reponseTexte);
                    }
               }
            );   
        }
    });
    
    $('form[name="modifiercourrier"]').submit(function(){
        return false;
    });
	
	//supprimer un courrier
	$('#btsupprimer').click(function(){
		$( "#dialog" ).html('La suppression du courrier est irréversible.\nConfirmer votre action');
		$( "#dialog" ).dialog({
			modal: true,
			height : 200,
			width : 400,
			buttons: {
				"Oui": function() {
					$.post(
						'ajax.php', {
							idc : $('input[name="codecourrier"]').val(),
							code : 'sc' }, function(reponseTexte){
							var codeExiste = reponseTexte ;
							if( codeExiste == 1){
								alert('Courrier supprimer');
								$(location).attr('href', "principale.php?page=listecourrier");
							}
							else{
								$('.erreur3').css('display', 'block') ;
								$('.erreur3').css('background-color', '#EE2622') ;
								$('.erreur3').html('Erreur') ;
							}
						}
					  );
					$( this ).dialog( "close" );
				},
				"Non": function() {
					alert('Suppression annulée!');	
					$( this ).dialog( "close" );
				}
			}
		});
	});
    
    //modifier un courrier
    
    $('#btvalidermodifcourrier').click(function(){
        if( $('input[name="codecourrier"]').val() == '' || $('input[name="datearriver"]').val() == '' || $('input[name="expediteur"]').val() == '' ||
            $('textarea[name="objet"]').val() == '' ){
            $('.erreur').css('display', 'block') ;
            $('.erreur').css('background-color', '#C00000') ;
            $('.erreur').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php', {
                        codecourrier : $('input[name="codecourrier"]').val(),
                        anciencodecourrier : $('input[name="idc"]').val(),
                        datearriver : $('input[name="datearriver"]').val(),
                        expediteur : $('input[name="expediteur"]').val(),
                        objet : $('textarea[name="objet"]').val(),
                        dateretour : $('input[name="dateretour"]').val(),
                        code : 'mc'
                    }, function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    if( codeExiste == 0){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Ce numero de courrier existe d&eacute;j&acirc;') ;
                        $('input[name="codecourrier"]').attr('value','');
                        $('textarea[name="objet"]').attr('value','');
                    }
                    else if( codeExiste == 1){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', 'green') ;
                        $('.erreur').html('Enregistrement &eacute;ffectu&eacute;') ;
                        $('input[type="text"]').attr('value','');
                        $('textarea[name="objet"]').attr('value','');
                    }
                    else{
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Erreur de parametre') ;
                    }
               }
            );   
        }
    });

    //donner une suite a un courrier
    
    $('form[name="dscourrier"]').submit(function(){
        return false;
    });
    
    $('#btvaliderdscourrier').click(function(){
        if( $('textarea[name="suite"]').val() == '' ){
            $('.erreur2').css('display', 'block') ;
            $('.erreur2').css('background-color', '#C00000') ;
            $('.erreur2').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php', {
                        idc : $('input[name="idc"]').val(),
                        suite : $('textarea[name="suite"]').val(),
                        code : 'mc/ds'
                    }, function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    if( codeExiste == 0){
                        alert("Le courrier est actuellement transferé\n Pour donner une suite elle doit être d'abord retourné")
                    }
                    else if( codeExiste == 1){
                        $('.erreur2').css('display', 'block') ;
                        $('.erreur2').css('background-color', 'green') ;
                        $('.erreur2').html('Courrier mis &agrave; jour') ;
                        $('textarea[name="suite"]').attr('value','');
                    }
                    else{
                        $('.erreur2').css('display', 'block') ;
                        $('.erreur2').css('background-color', '#EE2622') ;
                        $('.erreur2').html('Erreur de parametre') ;
                    }
               }
            );   
        }
    });
    
    //enregistrer un utilisateur
    
    $('form[name="inscription"]').submit(function(){
        return false;
    });
    
    $('#btinscription').click(function(){
        if( $('input[name="nom"]').val() == '' || $('input[name="prenom"]').val() == '' || $('input[name="pseudo"]').val() == '' || 
            $('input[name="passwd"]').val() == '' || $('input[name="passwd2"]').val() == '' ){
            $('.erreur').css('display', 'block') ;
            $('.erreur').css('background-color', '#C00000') ;
            $('.erreur').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php', {
                    nom : $('input[name="nom"]').val(),
                    prenom : $('input[name="prenom"]').val(),
                    sexe : $('select[name="sexe"]').val(),
                    pseudo : $('input[name="pseudo"]').val(),
                    passwd : $('input[name="passwd"]').val(),
                    passwd2 : $('input[name="passwd2"]').val(),
                    droit : $('select[name="droit"]').val(),
                    droitnotification : $('select[name="droitnotification"]').val(),
                    code : 'au'
                }, function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    if( codeExiste == 0){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Ce pseudo existe d&eacute;j&acirc;') ;
                        $('input[name="pseudo"]').attr('value','');
                        //alert( reponseTexte) ;
                    }
                    else if( codeExiste == 1){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', 'green') ;
                        $('.erreur').html('Enregistrement &eacute;ffectu&eacute;') ;
                        $('input[type="text"]').attr('value','');
                        $('input[type="password"]').attr('value','');
                        //alert( reponseTexte) ;
                    }
                    else{
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Erreur de parametre') ;
                        //alert( reponseTexte) ;
                    }
               }
            );   
        }
    });
    
    //modifier un utilisateur
    
    $('form[name="inscription"]').submit(function(){
        return false;
    });
    
    $('#btmodifierutilisateur').click(function(){
        if( $('input[name="nom"]').val() == '' || $('input[name="prenom"]').val() == '' || $('input[name="pseudo"]').val() == '' ){
            $('.erreur').css('display', 'block') ;
            $('.erreur').css('background-color', '#C00000') ;
            $('.erreur').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php', {
				    iduser : $('input[name="iduser"]').val(),
                    nom : $('input[name="nom"]').val(),
                    prenom : $('input[name="prenom"]').val(),
                    sexe : $('select[name="sexe"]').val(),
                    pseudo : $('input[name="pseudo"]').val(),
                    pseudo2 : $('input[name="pseudo2"]').val(),
                    droit : $('select[name="droit"]').val(),
                    droitnotification : $('select[name="droitnotification"]').val(),
                    code : 'mu'
                }, function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    if( codeExiste == 0){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Ce pseudo existe d&eacute;j&acirc;') ;
                        $('input[name="codecourrier"]').attr('value','');
                    }
                    else if( codeExiste == 1){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', 'green') ;
                        $('.erreur').html('Modification &eacute;ffectu&eacute;') ;
                        $('input[type="text"]').attr('value','');
                        $('input[type="password"]').attr('value','');
                    }
                    else if( codeExiste == 3){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Les mots de passe ne correspondent pas') ;
                        $('input[type="password"]').attr('value','');
                    }
                    else{
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Erreur de parametre') ;
                    }
               }
            );   
        }
    });
    
	//supprimer l'utilisateur
	
	$('.suppruser').click(function(){
		var iduser = $(this).attr('id') ;
		//var idc = $('input[name="codecourrier"]').val() ;
		$( "#dialog" ).html('Suppression de l\'utilisateur.\nConfirmer votre action');
		$( "#dialog" ).dialog({
			modal: true,
			height : 200,
			width : 400,
			buttons: {
				"Oui": function() {
					$.post(
						'ajax.php', {
							iduser : iduser,
							code : 'su' 
						}, function(reponseTexte){
							var codeExiste = reponseTexte ;
							if( codeExiste == 1){
								alert('Utilisateur désactivé');
								$(location).attr('href', "principale.php?page=listeuser");
							}
							else{
								$('.erreur3').css('display', 'block') ;
								$('.erreur3').css('background-color', '#EE2622') ;
								$('.erreur3').html('Erreur') ;
							}
						}
					  );
					$( this ).dialog( "close" );
				},
				"Non": function() {
					alert('Désactivation annulée!');	
					$( this ).dialog( "close" ) ;
				}
			}
		});
	});
	
	//activer l'utilisateur
	
	$('.activeruser').click(function(){
		var iduser = $(this).attr('id') ;
		//var idc = $('input[name="codecourrier"]').val() ;
		$( "#dialog" ).html('Activation de l\'utilisateur.\nConfirmer votre action');
		$( "#dialog" ).dialog({
			modal: true,
			height : 200,
			width : 400,
			buttons: {
				"Oui": function() {
					$.post(
						'ajax.php', {
							iduser : iduser,
							code : 'acu' 
						}, function(reponseTexte){
							var codeExiste = reponseTexte ;
							if( codeExiste == 1){
								alert('Utilisateur activé');
								$(location).attr('href', "principale.php?page=listeuser");
							}
							else{
								$('.erreur3').css('display', 'block') ;
								$('.erreur3').css('background-color', '#EE2622') ;
								$('.erreur3').html('Erreur') ;
							}
						}
					  );
					$( this ).dialog( "close" );
				},
				"Non": function() {
					alert('Activation annulée!');	
					$( this ).dialog( "close" ) ;
				}
			}
		});
	});
	
    //modifier mot de passe
    
    $('form[name="changepasswd"]').submit(function(){
        return false;
    });
    
    $('#btchangepasswd').click(function(){
        if( $('input[name="actuelpasswd"]').val() == '' || $('input[name="passwd"]').val() == '' || $('input[name="passwd2"]').val() == '' ){
            $('.erreur').css('display', 'block') ;
            $('.erreur').css('background-color', '#C00000') ;
            $('.erreur').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php', {
                    actuelpasswd : $('input[name="actuelpasswd"]').val(),
                    passwd : $('input[name="passwd"]').val(),
                    passwd2 : $('input[name="passwd2"]').val(),
                    code : 'mp'
                }, function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    if( codeExiste == 0){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Mot de passe actuel incorrect') ;
                        $('input[type="password"]').attr('value','');
                    }
                    else if( codeExiste == 1){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Les nouveaux mots de passe ne correspondent pas') ;
                        $('input[type="password"]').attr('value','');
                    }
                    else if( codeExiste == 2){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', 'green') ;
                        $('.erreur').html('Modification &eacute;ffectu&eacute;') ;
                        $('input[type="text"]').attr('value','');
                        $('input[type="password"]').attr('value','');
                    }
                    else if( codeExiste == 3){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Erreur de parametre') ;
                    }
               }
            );   
        }
    });
    
    //transferer un courrier
    
    $('form[name="transfert"]').submit(function(){
        return false;
    });
    
    $('#btajoutertransfert').click(function(){
        if( $('input[name="datetransfert"]').val() == '' || $('input[name="receveur"]').val() == '' || $('input[name="objet"]').val() == '' ){
            $('.erreur').css('display', 'block') ;
            $('.erreur').css('background-color', '#C00000') ;
            $('.erreur').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php',
               {
                    datetransfert : $('input[name="datetransfert"]').val(),
                    receveur : $('input[name="receveur"]').val(),
                    objet : $('input[name="objet"]').val(),
                    dateretour : $('input[name="dateretour"]').val(),
                    code : 'tc'
               },
               function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    
                    if( codeExiste == 1){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', 'green') ;
                        $('.erreur').html('Transfert &eacute;ffectu&eacute;') ;
                        $('input[type="text"]').attr('value','');
                    }
                    else{
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Erreur de parametre') ;
                    }
               }
            );   
        }
    });
    
    $('#lientransfert').click(function(){
        var codeTransfert = $('input[name="codetransfert"]').val() ;
        if( codeTransfert == 1 ){
            $('.erreur3').css('display', 'block') ;
            $('.erreur3').css('background-color', '#EE2622') ;
            $('.erreur3').html("Le fichier est d&eacute;j&agrave; transferer. elle doit etre d&#39;abord retourn&eacute;") ;
            $('.erreur3').show("slow").delay(4000).hide("slow");
            //alert("Le fichier est déjà transferer. elle doit etre d'abord retourné") ;
        }
        else{
            window.location = 'principale.php?page=ajoutertransfert' ;
        }
        return false;
    });
    
    $('form[name="mtransfert"]').submit(function(){
        return false;
    });
    
    //modifier un transfert de courrier
    
    $('#btmodifiertransfert').click(function(){
        if( $('input[name="datetransfert"]').val() == '' || $('input[name="receveur"]').val() == '' || $('input[name="objet"]').val() == '' ){
            $('.erreur').css('display', 'block') ;
            $('.erreur').css('background-color', '#C00000') ;
            $('.erreur').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php',
               {
                    idtransfert : $('input[name="idt"]').val(),
                    datetransfert : $('input[name="datetransfert"]').val(),
                    receveur : $('input[name="receveur"]').val(),
                    objet : $('input[name="objet"]').val(),
                    dateretour : $('input[name="dateretour"]').val(),
                    code : 'mt'
               },
               function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    
                    if( codeExiste == 1){
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', 'green') ;
                        $('.erreur').html('Modification &eacute;ffectu&eacute;') ;
                        $('input[name="text"]').attr('value','');
                    }
                    else{
                        $('.erreur').css('display', 'block') ;
                        $('.erreur').css('background-color', '#EE2622') ;
                        $('.erreur').html('Erreur de parametre') ;
                    }
               }
            );   
        }
    });
    
    //donner suite a un transfert de courrier
        
    $('form[name="dstransfert"]').submit(function(){
        return false;
    });
    
    $('#btvaliderdstransfert').click(function(){
        if( $('input[name="dateretour"]').val() == '' || $('textarea[name="suite"]').val() == '' ){
            $('.erreur2').css('display', 'block') ;
            $('.erreur2').css('background-color', '#C00000') ;
            $('.erreur2').html('Aucun champs ne doit &egrave;tre vide') ;
        }
        else{
            $.post(
               'ajax.php',
               {
                    idtransfert : $('input[name="idt"]').val(),
                    dateretour : $('input[name="datetransfert"]').val(),
                    suite : $('textarea[name="suite"]').val(),
                    code : 'mt/ds'
               },
               function(reponseTexte){
                    var codeExiste = reponseTexte ;
                    
                    if( codeExiste == 1){
                        $('.erreur2').css('display', 'block') ;
                        $('.erreur2').css('background-color', 'green') ;
                        $('.erreur2').html('Mis &agrave; jour &eacute;ffectu&eacute;') ;
                        ('input[name="dateretour"]').attr('value','');
                        $('textarea[name="suite"]').attr('value','');
                    }
                    else{
                        $('.erreur2').css('display', 'block') ;
                        $('.erreur2').css('background-color', '#EE2622') ;
                        $('.erreur2').html('Erreur de parametre') ;
                    }
               }
            );   
        }
    });
	
	//supprimer un transfert
	
	$('.supprtrans').click(function(){
		var idtransfert = $(this).attr('id') ;
		var idc = $('input[name="codecourrier"]').val() ;
		$( "#dialog" ).html('La suppression du transfert est irréversible.\nConfirmer votre action');
		$( "#dialog" ).dialog({
			modal: true,
			height : 200,
			width : 400,
			buttons: {
				"Oui": function() {
					$.post(
						'ajax.php', {
							idt : idtransfert,
							code : 'st' 
						}, function(reponseTexte){
							var codeExiste = reponseTexte ;
							if( codeExiste == 1){
								alert('Transfert supprimer');
								$(location).attr('href', "principale.php?page=detailscourrier&idc="+idc);
							}
							else{
								$('.erreur3').css('display', 'block') ;
								$('.erreur3').css('background-color', '#EE2622') ;
								$('.erreur3').html('Erreur') ;
							}
						}
					  );
					$( this ).dialog( "close" );
				},
				"Non": function() {
					alert('Suppression annulée!');	
					$( this ).dialog( "close" ) ;
				}
			}
		});
	});
    //datatable
    $('#tablo').dataTable({
        "sPaginationType": "full_numbers",
        "oLanguage": { "sProcessing":   "Traitement en cours...",
            "sLengthMenu":   "Afficher _MENU_ &eacute;l&eacute;ments",
            "sZeroRecords":  "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sInfo": "Affichage de l&#39;&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            "sInfoEmpty": "Affichage de l&#39;&agrave;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix":  "",
            "sSearch":       "Rechercher:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Premier",
                "sPrevious": "Pr&eacute;c&eacute;dent",
                "sNext":     "Suivant",
                "sLast":     "Dernier"
            }
        }
    });
    
    //afficher un calendrier pour choisir une date
    $('.date').datepicker() ;
    $(function($){
	$.datepicker.regional['fr'] = {
	closeText: 'Fermer',
	prevText: '&#x3c;Préc',
	nextText: 'Suiv&#x3e;',
	currentText: 'Courant',
	monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
	'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
	monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
	'Jul','Aoû','Sep','Oct','Nov','Déc'],
	dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
	dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
	dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
	weekHeader: 'Sm',
	dateFormat: 'dd-mm-yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['fr']);
    });
});