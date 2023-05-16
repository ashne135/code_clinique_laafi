<?php 
 
   session_start() ;
  if(isset($_POST['Se connecter'])){ 
   
    if(isset($_POST['Email']) && isset($_POST['mdp'])) {
      
      $email = $_POST['Email'] ;
      $mdp = $_POST['mdp'] ;
      $erreur = "" ;
       
       $nom_serveur = "localhost";
       $utilisateur = "root";
       $mot_de_passe ="";
       $nom_base_données ="login" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       
        $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE Email = '$Email' AND mdp ='$mdp' ") ;
        $num_ligne = mysqli_num_rows($req) ;
        if($num_ligne > 0){
            header("Location:bienvenu.php") ;
            $_SESSION['email'] = $email ;
        }else {
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connexion.css">
    <title>Document</title>
</head>
<body>
<?php 
       if(isset($erreur)){
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
    <div class="login">
        <form action="#" method="post">
            <h2 class="con">connexion</h2>
            <div class="container_rond">
                <div class="rond"></div> 
                <div class="rond"></div>
                <div class="rond"></div>
                <div class="rond"></div>
                <div class="rond"> </div>
                <div class="rond"></div>
                 <br>
            </div>
            <input class="input" type="text" name="Email" placeholder="Entrer votre Email"><br> <br>
            <input class="input" type="password" name="mdp" placeholder="Entrer votre mots de passe">
           <div class="mdp"> <a href=""><h2 class="italic">Mot de passe oublié</h2></a></div>
            <button >Se connecter</button>
            <hr>
            <div class="sinscrir"><a href=""><h2 class="italic">S'inscrire...</h2></a></div>
        </form>

    </div>
</body>
</html>