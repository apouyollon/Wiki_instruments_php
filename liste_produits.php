<?php
session_start();
//verification que l'utilisateur est authentifié
/*if($_SESSION['identifiant']==null){
    //sinon, redirection vers la page d'authentification (page index.php)
    header('Location: index.php');
//error_reporting(E_ALL);
}*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Instruments</title>
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

    <!-- Contenu principal de la page généré par la base de données-->
<div class="container px-4 px-lg-5"> 
    <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
        <div class="tableau">
            <table> <!-- Création d'un tableau pour y regrouper les instruments-->
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Famille</th>
                    <th>Description</th> 

                <tbody>

                <?php 
                include("connexion.php");
                $res=mysqli_query($connexion,"SELECT * FROM instruments ORDER BY famille");
                // création de la requête sql pour afficher les résultats dans le tableau
                while($ligne = mysqli_fetch_assoc($res)) { //afficher chaque ligne de la base de données dans le tableau
                echo '<tr>';
                echo '<td>' . $ligne['nominstrument'] . '</td>';
                echo '<td>' . $ligne['famille'] . '</td>';
                echo '<td>' . $ligne['description'] . '</td>';
                echo "<td class='noborder'><a href='supprimer.php?id=".$ligne['id']."'><img class='croix' src='assets/img/supprimer.png'/></a></td>" ;
                // création d'une case supplémentaire pour supprimer l'élément, redirection vers la page supprimer.php 
                echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div> 
</div>

<?php
include("layouts/footer.html");
?>

</html>