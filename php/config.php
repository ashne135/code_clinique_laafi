<?php 
//Nous allons mettres l'email et le mot de passe dans des variables
$email = $_POST['Email'] ;
$mdp = $_POST['mdp'] ;
$erreur = "" ;
 //Nous allons verifier si les informations entrée sont correctes
 //Connexion a la base de données
 $nom_serveur = "localhost";
 $utilisateur = "root";
 $mot_de_passe ="";
 $nom_base_données ="login" ;
 $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
 //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
  $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE Email = '$Email' AND mdp ='$mdp' ") ;
  $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
  if($num_ligne > 0){
      header("Location:bienvenu.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
      // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
      $_SESSION['Email'] = $Email ;
  }else {//si non
      $erreur = "Adresse Mail ou Mots de passe incorrectes !";
  }


?>