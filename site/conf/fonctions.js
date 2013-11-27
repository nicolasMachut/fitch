function message(id, text, type)//Affiche un message bootstrap dans un <div id="message"> de type alert
{
	supprimerEnfantDiv(id);
	var message = document.getElementById(id);
	var newP = document.createElement('p');
	var newPText = document.createTextNode(text);
	message.style.display="block";
	message.className=type;
	newP.appendChild(newPText);
	message.appendChild(newP);
};

//----------------------------------------------------------------------------------------------------------------------------------------

function supprimerEnfantDiv(id)//Supprime tous les noeuds enfant d'un div
{
	var div = document.getElementById(id);
	while( div.firstChild) {
	    div.removeChild( div.firstChild);
	}
};

//----------------------------------------------------------------------------------------------------------------------------------------

function creationXHR()//Initialise l'objet XHR
{
	var xhr = null;
    if (window.XMLHttpRequest) { 
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) 
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xhr;
};

//----------------------------------------------------------------------------------------------------------------------------------------

function deconnexionAdmin()//Déconnexion de l'administrateur, détruit la variable session
{
	xhr = creationXHR();
	xhr.open("GET", "connexionAdmin.php?type=0", false);
	xhr.send(null);
	location.reload(); 
	
}

//----------------------------------------------------------------------------------------------------------------------------------------

function connexionAdmin(mail, mdp)//COnnexion admin, verifie le form, la bdd, et créer la session
{
	mail = document.getElementById('mail').value;
	mdp = document.getElementById('mdp').value;
	if( mail == "" || mdp == "" )
	{
		supprimerEnfantDiv("message");
		message("message", "Au moins un des champs est vide.", "alert alert-error");
	}
	else
	{
		xhr = creationXHR();
		mail = encodeURIComponent(mail);
		//mdp = encoreURIComponent(mdp);
	    xhr.open("GET", "connexionAdmin.php?type=1&mail="+mail+"&mdp="+mdp+"", false);
	    xhr.send(null);
	    if((xhr.responseText) == 1)
    	{
	    	location=('admin/index.php');
    	}
	    else
	    {
	    	message('message', 'Mail et/ou mot de passe incorrect.', 'alert alert-error');
	   	}
	}
}

//----------------------------------------------------------------------------------------------------------------------------------------

function addVideo()//Ajoute une vidéo
{	
	var lien = document.getElementById('lien').value;
	if(lien == '')
	{
		message("message", "Veuillez coller un lien pour ajouter une vidéo.", "alert alert-error");
	}
	else
	{
		xhr = creationXHR();
		lien = encodeURIComponent(lien);
	    xhr.open("GET", "../conf/requetesXHR.php?lien="+lien+"&requete=addVideo", false);
	    xhr.send(null);
	    message("message", "La vidéo à bien été enregistrée.", "alert alert-success");
	    document.getElementById('lien').value="";
	    loadDisplayVideo();
	    //alert(xhr.responseText);
	}
}

//----------------------------------------------------------------------------------------------------------------------------------------

function removeVideo(id)//Supprime une vidéo
{

	xhr = creationXHR();
	id = encodeURIComponent(id);
	xhr.open("GET", "../conf/requetesXHR.php?id="+id+"&requete=removeVideo", false);
	xhr.send(null);
	//location.reload();
	message("message", "La vidéo à bien été supprimée.", "alert alert-success");
	loadDisplayVideo();
}

//----------------------------------------------------------------------------------------------------------------------------------------

function removeMusic(id)
{
//	alert(id);
	xhr = creationXHR();
	id = encodeURIComponent(id);
	xhr.open("GET", "../conf/requetesXHR.php?id="+id+"&requete=removeMusic", false);
	xhr.send(null);
	//location.reload();
	message("message", "La musique à bien été supprimée.", "alert alert-success");
//	alert(xhr.responseText);
	loadDisplayMusic();
	
}

//----------------------------------------------------------------------------------------------------------------------------------------

function addMusic()
{
	var lien = document.getElementById('lien').value;
	if(lien == '')
	{
		message("message", "Veuillez coller un lien pour ajouter une musique.", "alert alert-error");
	}
	else
	{
		xhr = creationXHR();
		lien = encodeURIComponent(lien);
	    xhr.open("GET", "../conf/requetesXHR.php?lien="+lien+"&requete=addMusic", false);
	    xhr.send(null);
	    message("message", "La musique à bien été enregistrée.", "alert alert-success");
	    document.getElementById('lien').value="";
	   // alert(xhr.responseText);
	    loadDisplayMusic();
	}
}

//----------------------------------------------------------------------------------------------------------------------------------------

function addPhoto()
{
	var lien = document.getElementById('lien').value;
	if(lien == '')
	{
		message("message", "Veuillez coller un lien pour ajouter une photo.", "alert alert-error");
	}
	else
	{
		xhr = creationXHR();
		lien = encodeURIComponent(lien);
		//alert(lien);
	    xhr.open("GET", "../conf/requetesXHR.php?lien="+lien+"&requete=addPhoto", false);
	    xhr.send(null);
	    //alert(xhr.responseText);
	    message("message", "La photo à bien été enregistrée.", "alert alert-success");
	    document.getElementById('lien').value="";
	    //alert(xhr.responseText);
	    loadDisplayPhoto();
	}
}

//----------------------------------------------------------------------------------------------------------------------------------------


function displayVideo()
{
	xhr = creationXHR();
	xhr.open("GET", "../conf/requetesXHR.php?requete=displayVideo", false);
	xhr.send(null);
	alert(xhr.responseText);
}

//----------------------------------------------------------------------------------------------------------------------------------------

function loadDisplayVideo()
{
	$.post('../conf/requetesXHR.php?requete=loadDisplayVideo', function(data, textStatus){
		$('#displayVideo').html(data);
	});
}

//----------------------------------------------------------------------------------------------------------------------------------------

function loadDisplayMusic()
{
	$.post('../conf/requetesXHR.php?requete=loadDisplayMusic', function(data, textStatus){
		$('#displayMusic').html(data);
	});
}

//----------------------------------------------------------------------------------------------------------------------------------------

function loadDisplayPhoto()
{
	$.post('../conf/requetesXHR.php?requete=loadDisplayPhoto', function(data, textStatus){
		$('#displayPhoto').html(data);
	});
}

//----------------------------------------------------------------------------------------------------------------------------------------

function classementVideo(classement)
{
	var radios = document.getElementsByName('optionsRadios');
	
	for (var i = 0, length = radios.length; i < length; i++) {
	    if (radios[i].checked) {
	        // do whatever you want with the checked radio
	        xhr = creationXHR();
	        xhr.open("GET", "../conf/requetesXHR.php?requete=classementVideo&sens="+radios[i].value+"", false);
	        xhr.send(null);
	        alert(xhr.responseText);
	        // only one radio can be logically checked, don't check the rest
	        break;
	    }
	}
}

//----------------------------------------------------------------------------------------------------------------------------------------