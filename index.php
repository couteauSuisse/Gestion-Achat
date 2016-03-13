<?php session_start();
$nomPage ='ACCUEIL';

include('includes/connect_db.php');
if(isset($_GET['message'])){
    $message = $_GET['message'];
    
    switch($message){
        case 1:
        $message = 'Utilisateur non trouvé, veuillez recommencer, merci';
        break;
        case 2:
        $message = ', vous êtes maintenant connecté';
        if($_SESSION['genre'] == 1){
        $message .= 'e';
        }
        break;        
        case 3:
        $message = 'Vous êtes maintenant déconnecté';
        break;
        
    }
}
if(isset($_POST['identifiant'])){
		// traitement de réception des données
		$user   = $_POST['identifiant'];
		$mdp    = $_POST['motdepasse'];

		
		$sql = "SELECT users_tbl.id_user, nom, prenom, email, mtp, genre, id_genre, type_genre, id_admin, admin_tbl.id_droits,   supervisor_tbl.id_droits, id_supervisor  
		FROM users_tbl
		LEFT JOIN admin_tbl ON admin_tbl.id_user = users_tbl.id_user 
        LEFT JOIN supervisor_tbl ON supervisor_tbl.id_user = users_tbl.id_user 
		LEFT JOIN genre_tbl ON users_tbl.genre = genre_tbl.id_genre 
		
		 WHERE email = '".$user."' AND mtp = '".$mdp."' ";
		 try{
		 	$req = $bdd->prepare($sql);
		 	$req->execute();
			$ligne = $req->fetch(PDO::FETCH_OBJ);
			// var_dump($ligne);
			
		 }catch(Exception $e){
			die('Erreur  : ' . $e->getMessage().' <br>Numéro erreur depuis select de connexion.php : '.$e->getCode());
			}
		 
		 if(isset($ligne->nom)){
			 /*
		users_tbl ( id_user, nom, prenom, email, mtp, genre, date_rec  
  		admin_tbl 	id_admin, id_user, id_secteur 
  		secteur_tbl id_secteur, nom_secteur
  		genre_tbl 	id_genre, type_genre
		*/
			 $_SESSION['id_user'] 	    = $ligne->id_user;
			 $_SESSION['AchatNom'] 		= $ligne->nom;
			 $_SESSION['AchatPrenom'] 	= $ligne->prenom;
			 $_SESSION['email'] 	    = $ligne->email;
			 $_SESSION['genre'] 	    = $ligne->genre;
			 $_SESSION['civilite'] 	    = $ligne->type_genre;
			 $_SESSION['id_admin'] 	    = $ligne->id_admin;
             $_SESSION['id_supervisor'] = $ligne->id_supervisor;
             $_SESSION['id_droits']     = $ligne->id_droits;
			
			header("location: ".$_SERVER['PHP_SELF']."?message=2"); 
			 
		 }else{
			 // l'identifiant ou le mot de passe n'est pas reconnu par la base de données.
			 header("location: ".$path."index.php?message=1");
		 }
		  
	} // fin du traitement des informations envoyées au serveur par le formulaire


include('includes/commun.php');
include('includes/header.php');
include('includes/menu.php')

?>
<div id="conteneur" class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-3">
        <!-- debut panel -->
        <div id="identite" class="panel panel-default col-lg-10">
            <div class="panel-body">
        <?php // inclure le contenu en fonction de la situation
        if(isset($_SESSION['id_user'])){
            echo ucfirst(messageHeure());
            echo ', '.$_SESSION['civilite'].' '.$_SESSION['AchatPrenom'].' '.$_SESSION['AchatNom'];
        }
        if(isset($message)){
            echo $message;
        }
        ?>      </div>
            </div>
        </div>
        <!-- // fin panel -->
        <div class="col-lg-12">
            <h4>
        <?php
        // echo '<div class="clearfix"></div>'."\n";
        
        if($nomPage =='ACCUEIL'){
           echo EXPLICATIONS;   
        }else{
           include($page);     
        }
        ?>
            </h4>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>