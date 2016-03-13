// JavaScript Document
// début du script de compteur de caractères pour le textarea de "votre message" 
	function textCounter(field, countfield, maxlimit) {
		if (field.value.length > maxlimit){ // si trop long ...c'est coupé!
			field.value = field.value.substring(0, maxlimit);
		// si non incrémente le compteur de caractères restants
		}else{ 
			countfield.value = maxlimit - field.value.length;
		}
	}
// Fin du script de compteur de caractères 