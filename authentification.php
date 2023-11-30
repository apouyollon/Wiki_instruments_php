<?php
session_start();
//error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Liens CSS ci-dessous-->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <?php
include("layouts/navbar.html");
include("layouts/header.html");
?>

    <!-- Contenu principal de la page authentification-->
    <?php
    //récupération des variables du formulaire
    $identifiant=$_POST['identifiant'] ?? null;
    $password=$_POST['motdepasse'] ?? null;
    //cryptage du mot de passe en md5
    $motdepasse=md5($password);
    //rajout dans index.php:<form action="authentification.php" method="POST">, le formulaire enclenche la page authentification
    include("connexion.php");
    /*Base de données
    Nom de la table des visiteurs: utilisateur
    champs de la table:
    nom, prenom, email, identifiant, motdepasse*/
    $res=mysqli_query($connexion, "select identifiant from utilisateur where identifiant like '$identifiant' and motdepasse='$motdepasse'");
    //on comptabilise le nombre de résultats obtenus, il en faut au moins 1 pour déclencher la conditionnelle
    $row_cnt = mysqli_num_rows($res);
    if($row_cnt>=1)
    {//on stocke le login dans la session
    $_SESSION['identifiant']= $identifiant;
    //echo("$identifiant");
    //redirection vers accueil.php
    header('Location: accueil.php');
    }
    else
    //sinon renvoi vers page authentification
    {header('Location: index.php');
    echo("erreur authentification");}
    ?>

    <?php
include("layouts/footer.html");
?>

</html>