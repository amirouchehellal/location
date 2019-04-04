

$('#connect').click(function(event){
	event.preventDefault();

	var mdp = $('#mot_de_passe').val();
	var pseudo = $('#pseu').val();

	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){

		if(xhr.readyState == 4 && xhr.status == 200){

			document.getElementById('msg1').innerHTML = xhr.responseText;

			console.log(xhr.responseText.lenght);


			if(xhr.responseText === '')
			{
				
				$('#exampleModal').modal('hide');
				window.location.reload(true);
			}	
		}
	}
	xhr.open('POST','http://amirouchecodeur.fr/sallea/ajax/ajax-connexion.php');
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send('mdp='+mdp+'&pseudo='+pseudo);

});
/*----------------------------------------------------------------------XMLHttprequest-----------------------------------------------------------------------------------------------------------------*/



/*----------------------------------------------------------------------XMLHttprequest-----------------------------------------------------------------------------------------------------------------*/

