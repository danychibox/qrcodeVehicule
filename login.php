<!DOCTYPE html>
<html lang="fr">
<head>
	<title>connexion</title>
	<meta charset="utf-8">
       <link rel="stylesheet" type="text/css" href="design/connexion.css"/>
</head>
    <body> 
        <header>
            <div class="principal">
                				<ul>
                                    <li ><a href="index.html">accueil</a></li>
                                    <li><a href="propos">a propos de nous</a></li>
                                    <li class="active"><a href="login.php">connexion</a></li>
                                </ul>
            		          <div class="champs">
                                    <div class="champs-input">
                                        <form name="connecter" method="POST" action="accueil.php">
                                    <input type="text" class="input" name="util" placeholder="utilisateur">
                                    <input type="password" class="input" name="mdp" placeholder="mot de passe">
                                    </div>
                            <input type="submit" name="connecter" class="btn" value="connexion"> 
                                </form>
                         </div>
             </div>
        </header>
    </body>
</html>
<?php
session_start();   
    $connexion=new PDO('mysql:host=localhost;dbname=surveillance','root','');
    if(!$connexion){
        echo "erreur  de connexion";
        }
    else if(isset($_POST['connecter'])){ 
         $use=$_POST['util'];
         $mdp=$_POST['mdp'];  
         $requete=$connexion->prepare("select* from authentification where user= ? and motdepasse= ?");
        $requete->execute(array($use,$mdp));
        $userexist=$requete->rowCount();
         if($userexist==1) {
         $userinfo=$requete->fetch();
        $_SESSION['id']=$userinfo['id']; 
        header("Location:accueil.html?id=".$_SESSION['id']);

         }
         else{
             echo "mot de passe ou utilisateur incorrect";
            }
        }
        
   
?>