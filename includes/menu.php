<?php
// menu

?>
    <nav class="navbar navbar-default navbar-fixed-top" id="header_bar" role="navigation">
  		<div class="container">
      <!-- Brand and toggle get grouped for better mobile display  -->
        	<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
 					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                    <a class="navbar-brand" href="index.php">
                        <div id="logo" class="col-lg-2 img-responsive"></div>
                    </a>
        	</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        	<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav nav-pills">
                <!-- 
					<li<?php /*
                    if($nomPage == 'ACCUEIL'){
						echo ' class="active"';
						echo '><a href="#">Accueil</a>';
					}else{
						echo '><a href="index.php"';
						if(!isset($_SESSION['AchatNom'])){
							echo 'class="disabled"';
						}
							echo '>Accueil</a>';
					} */
					?></li>
                   -->
                    <li class="col-lg-2<?php if($nomPage == 'COMMANDE'){
						echo ' active';
						echo ' text-center"><a href="#">Demande Achat</a>';
					}else{
						if(!isset($_SESSION['AchatNom'])){
                            echo ' text-center"><a href="#" class="navbar-link">';
						}else{
							echo ' text-center"><a href="index.php?page=commande">';
                        }
                        echo 'Demande Achat</a>';
					}
					?></li>
                     <li class="col-lg-2<?php if($nomPage == 'HISTORIQUE'){
						echo ' active';
						echo ' text-center"><a href="#">Historique</a>';
					}else{
						
						if(!isset($_SESSION['AchatNom'])){
                            echo ' text-center"><a href="#" class="navbar-link">';
						}else{
							echo ' text-center"><a href="index.php?page=histo_com">';
                            
                        }  
                        echo 'Historique</a>';                          
					}
					?></li>
                    <li class="col-lg-2<?php if($nomPage == 'CONTACT'){
						echo ' active';
						echo ' text-center"><a href="#">Contact</a>';
					}else{
						
						if(!isset($_SESSION['AchatNom'])){
							echo ' text-center"><a href="#" class="navbar-link">';
						}else{
                            echo ' text-center"><a href="index.php?page=contact">';
                       }
							echo 'Contact</a>';
					}
					?></li>
                    
                    
                    <?php if((isset($_SESSION['id_supervisor']) AND $_SESSION['id_supervisor'] >=1) AND (isset($_SESSION['id_supervisor']) AND $_SESSION['id_supervisor'] >=1)){ 
                    
                    echo '<li role="presentation" class="dropdown col-lg-2 text-center">'."\n\t\t\t";
                    
                        echo '<a class="dropdown-toggle" data-toggle="dropdown" ';
                        echo 'href="#" role="button">'."\n\t\t\t";
                        echo 'Gestion <span class="caret"></span></a>'."\n\t\t\t";
                    
                        echo '<ul class="dropdown-menu">'."\n"; 
                            echo '<li class="';
                                    if($nomPage == 'GESTION'){
                                        echo ' active';
                                        echo ' text-left">'."\n";
                                        echo '<a href="#">Gestion</a>'."\n";
                                    }else{
                                        echo ' text-left">'."\n";
                                        echo '<a href="index.php?page=gestion">Gestion</a>'."\n";
                                    }
                            echo '</li>'."\n";
                            echo '<li class="';
                                    if($nomPage == 'ADMIN'){
						                echo ' active';
						                echo ' text-left">';
                                        echo '<a href="#">Administration</a>'."\n";
					                }else{
						                echo ' text-left">';
                                        echo '<a href="admin_index.php">Administration</a>'."\n";
					                }
					        echo '</li>'."\n";
                        echo '</ul>'."\n";
                        
                    echo '</li>'."\n";
                    
                    }else if(isset($_SESSION['id_supervisor']) AND $_SESSION['id_supervisor'] >=1){ ?>
                    <li class="col-xs-12 col-lg-2<?php if($nomPage == 'GESTION'){
						echo ' active';
						echo ' text-center"><a href="#">Gestion</a>'."\n";
					}else{
						echo ' text-center"><a href="gestion.php">Gestion</a>'."\n";
					}
                    echo '</li>'."\n";
					?>
                    
                    <!-- commande , historique, contact, connexion - si superviseur -> gestion des commandes -->
                    <li>
                    <?php 
                    if(isset($_SESSION['id_supervisor']) AND $_SESSION['id_supervisor'] >=1){ ?>
                    <li class="col-lg-2<?php if($nomPage == 'ADMIN'){
						echo ' active';
						echo ' text-center"><a href="#">Administration</a>'."\n";
					}else{
						echo ' text-center"><a href="admin_index.php">Administration</a>'."\n";
					}
					?></li>
                   <?php }
                    } ?>
                   
                   
                   <li>
                    <?php if(!isset($_SESSION['AchatNom'])){ ?>
                        <a href="#" data-toggle="modal" data-target="#myModal" data-backdrop="true">Se connecter </a>
                    <?php }else{
                        echo '<a href="includes/deconnexion.php">Se déconnecter</a>'."\n";
                    } ?>
                    </li> 
                </ul>
            </div>
         </div>
    </nav>
    


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Se connecter</h4>
      </div>
      <div class="modal-body">
    <form name="connexion" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
	<div class="form-group">
    	<label for="identifiant">Identifiant</label>
        <input type="text" class="form-control" name="identifiant" id="identifiant">
   	</div>
    <div class="form-group">
    	<label for="motdepasse">Mot de passe</label>
        <input type="password" class="form-control" name="motdepasse" id="motdepasse">
    </div>
    <button class="btn btn-success" type="submit">Se connecter</button>


</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>