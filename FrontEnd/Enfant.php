<?php
include ("EnfantVO.php");

//$enfantdao = new EnfantDAO();
$enfantvo = new EnfantVO();

$dateCourente = getdate();

if (isset($_POST['notedevel'])) {
    $enfantvo->setDevelopmentEnfant($_POST['notedevel']);
}else $enfantvo->setDevelopmentEnfant("");

if (isset($_POST['ajoutincident'])) {
    $enfantvo->setHistoIncident($_POST['ajoutincident']);
}else $enfantvo->setHistoIncident("");

if (isset($_POST['ajoutComportement'])) {
    $enfantvo->setProbComport($_POST['ajoutComportement']);
}else $enfantvo->setProbComport("");

// Aller cherche l'enfant selectionne
$enfant = new EnfantVO(); // garde les details de l'enfant selectionne
if (isset($_GET[''])) {
    $enfant = $enfantdao->getEnfant('idenfant'); // chercher par id enfant 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $enfantvo->getPrenom()?> <?php echo $enfantvo->getNom()?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 100%}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
      min-height: 1000px;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Activit&eacute;s</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#"><?php echo $enfantvo->getPrenom()?> <?php echo $enfantvo->getNom()?></a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
        <h1><?php echo $enfantvo->getPrenom()?> <?php echo $enfantvo->getNom()?></h1>
        <img class="img-responsive" src="<?php echo $enfantvo->getPhoto();?>" width="200" height="200">       
    </div>

    <div class="col-sm-8 text-left"> 
      <br>
      <p>Date de Naissance : <?php echo $enfantvo->getDateNa()?></p>
      <p>Sexe : <?php echo $enfantvo->getGender()?></p> 
      <p>Programme choisi : <?php echo $enfantvo->getProgramme()?></p>
      <p>Éducatrice(s) Assign&eacute;e : <?php echo $enfantvo->getEducatrices()?></p>     
      <p>Coordonn&eacute;e tuteur(tutrice) principale : <?php echo $enfantvo->getCoordPr()?></p>
      <p>Coordonn&eacute;e tuteur(tutrice) secondaire : <?php echo $enfantvo->getCoordSec()?></p>
      <hr>
      <p>Contraintes M&eacute;dicales</p>
      <p><?php echo $enfantvo->getContMed()?></p>
      <hr>
      <p>Allergies</p>
      <p></p>
      <hr>
      <p>Liste de vaccination</p>
      <p><?php echo $enfantvo->getListeVaccination()?></p>
      
      <hr>
      <h4>Note du d&eacute;veloppement de ...</h4>
      <p></p>
      <form role="form" action="" method="post" id="form_dev">
        <div class="form-group">
          <textarea name="notedevel" id="notedevel" type="text" class="form-control" rows="3" placeholder="Notes..." autofocus required></textarea>
        </div>
        <button type="submit" class="btn btn-success" id="enregistrer_note" value="Envoyer">Enregistrer</button>
      </form>
      <br>
      <hr>
      <h4>Problem&egrave;s comportementaux</h4>
      <p> </p>
      <form role="form" action="" method="post" id="form_comportement">
        <div class="form-group">
          <textarea name="ajoutComportement" id="ajoutComportement" type="text" class="form-control" rows="3" placeholder="Detail Comportement..." autofocus required></textarea>
        </div>
        <button type="submit" class="btn btn-success" id="enregistrer_comportement" value="Envoyer">Enregistrer</button>
      </form>
      <br>
      <hr>
      <h4>Historique d'incidents</h4>
      <p></p>
      <form role="form" action="" method="post" id="form_incident">
        <div class="form-group">
          <textarea name="ajoutincident" id="ajoutincident" type="text" class="form-control" rows="3" placeholder="Detail incident..." autofocus required></textarea>
        </div>
        <button type="submit" class="btn btn-success" id="enregistrer_incident" value="Envoyer">Enregistrer</button>
      </form>
      <br>
      <hr>
      <h4>Liste des contacts</h4>
      <p><?php echo $enfantvo->getListeContactRecup()?></p>


      <br>
      <br>
    </div>
    <div class="col-sm-2 sidenav">
            <?php foreach($enfantvo as $idenf) {
                    if ($idenf->getIdEnfant() == $enfant->getIdEnfant()) {
                        echo "<li class=\"active\"><a href=\"Enfant.php\"> </a></li><br>";
                    }
                    else {
                        echo "<li class=\"$idenf\"><a href=\"Enfant.php\"> </a></li><br>";
                    }
                }
            ?>
      </ul>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <h4>Date : <?php echo $dateCourente[0]?></h4>
</footer>

</body>
</html>