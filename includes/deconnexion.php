<?php session_start();

        $_SESSION['id_user'] 	    = '';
        $_SESSION['AchatNom'] 		= '';
        $_SESSION['AchatPrenom'] 	= '';
        $_SESSION['email'] 	        = '';
        $_SESSION['genre'] 	        = '';
        $_SESSION['civilite'] 	    = '';
        $_SESSION['id_admin'] 	    = '';
	    $_SESSION['id_supervisor']  = '';
        $_SESSION['id_droits']      = '';

	 session_destroy();
	 header('location: ../index.php?message=3');
?>