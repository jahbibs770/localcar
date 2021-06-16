<?php require_once('connexion.php'); ?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="loccar_style.css"/>
</head>

<body>
    <div id="entete">
        <video autoplay="autoplay" class="video_entete">
            <source src="images/loc.mp4" type="video/mp4"/>
            
</video>

<p class="nomsite">Location CAR</p>

<div id="formauto">
    <form name="formauto" method="post" action="">
    <div class="col-md-10">
 <center>
<br><a href="" class="btn btn-primary btn-lg">Accueil</a>
<a href="" class="btn btn-primary btn-lg">Login</a>

</center>
  </div>
        <input id="motcle" type="text" name="motcle" placeholder="Recherche par marque..."/>
        <input class="btfind" type="submit" name="btsubmit" value="Recherche"/>
        </form>
    </div>
    </div>
    
    <div id="articles">
    <?php
    if(isset($_POST['btsubmit'])){
         $mc=$_POST['motcle'];   
         $reqSelect="select * from automobile where MARQUE like'%$mc%'";

    }
    else{
        $reqSelect="select * from automobile";  
    }
    $resultat=mysqli_query($cnloccar,$reqSelect);
    $nbr=mysqli_num_rows($resultat);
    echo "<p><b>".$nbr." </b> Resultats de votre recherche...</p>";
    while($ligne=mysqli_fetch_assoc($resultat))
    {
?>
 <div id="auto">
 <img src="<?php echo $ligne['PHOTO'] ?>" /><br />
 <?php echo $ligne['IMM']; ?><br />
 <?php echo $ligne['MARQUE']; ?><br />
 <?php echo $ligne['PRIX']; ?><br />
 <div class="form-group">
<center><button type="submit" name="ajouter" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> ajouter</button></center>
</div>
 </div>
 
 <?php } ?>
</body>
</html>