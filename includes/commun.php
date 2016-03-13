<?php
// *********************************
// Message en fonction de l'heure
// ******************************** 
function messageHeure() {
	$heure = date("H");

			
			if($heure > 23){
			$bonjour = "bonne nuit ";
			
			}elseif ($heure <= 5){
			$bonjour = "bonne nuit ";

			
			}elseif ($heure >= 6 AND $heure <= 12){
			$bonjour = "Bonjour ";

			
			}elseif ($heure > 12 AND $heure <= 18){
			$bonjour = "bon après-midi ";
						
			} elseif ($heure > 18 AND $heure <= 21){
			$bonjour = "bonsoir ";
			
			} elseif ($heure <= 23){
			$bonjour = "bonne nuit ";
			}
			return $bonjour;
	} 

?>