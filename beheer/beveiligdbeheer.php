<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/uitvoeren.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/connect.php';

use run\uitvoeren;

/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 6-4-2017
 * Time: 22:34
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
          crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <title>Beheerder Beveiligd</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/formulier.css"/>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand">Beheerder aanpassen</a>
      <ul class="nav navbar-nav">
        <li><a href="../recensies.php">Recensies</a></li>
        <li><a href="../formulier.php">Formulier</a></li>

      </ul>
      <span class="navbar-text">Ingelogd als <?php echo $_SESSION['gebruiker'] ?> </span>
    </div>
    <?php
    if ( isset($_SESSION['gebruiker']) ) {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../afhandeling/loguit.php">Uitloggen</a></li>
        <li><a href="beheerderinstellingen.php">Instellingen</a></li>

      </ul>
      <?php
    } else {
    }
    ?>

    </ul>

  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<table id="beheerdertable" class="table-hover table-responsive table">
  <thead class="thead-default">
  <tr>
    <th>Id</th>
    <th>Voornaam</th>
    <th>Achternaam</th>
    <th>Email</th>
    <th>Datum</th>
    <th>Score</th>
    <th>Afbeelingpath</th>
    <th>Berichtonderwerp</th>
    <th>Berichttekst</th>
    <th>Bewerk</th>
    <th>Verwijder</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $berichten = new uitvoeren();
  $data = $berichten->verkrijgBerichten("SELECT G.id, G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id");
  while ( $row = $data->fetch() ) {
    echo "<tr><td><p id='gebruikerid" . $row['id'] . "'>" . $row['id'] . "</p></td><td id='voornaaminput" . $row['id'] . "' class='bewerkbaar'>" . $row['voornaam'] . "</td><td id='achternaaminput" . $row['id'] . "' class='bewerkbaar'>" . $row['achternaam'] . "</td><td id='emailinput" . $row['id'] . "' class='bewerkbaar'>" . $row['email'] . "</td><td id='datuminput" . $row['id'] . "'>" . $row['datum'] . "</td><td id='scoreinput" . $row['id'] . "' class='bewerkbaar'>" . $row['score'] . "</td><td id='afbeeldingpathinput" . $row['id'] . "' class='bewerkbaar'>" . $row['afbeeldingpath'] . "</td><td id='berichtonderwerpinput" . $row['id'] . "' class='bewerkbaar'>" . $row['berichtonderwerp'] . "</td><td id='berichttekstinput" . $row['id'] . "' class='bewerkbaar'>" . $row['berichttekst'] . "</td><td id='verandergedeelte" . $row['id'] . "' ><a class='bewerknop" . $row['id'] . "' onclick='return bewerk(" . $row['id'] . ");'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td><td><a id='verwijder" . $row['id'] . "'  onclick='return verwijder(" . $row['id'] . ");'><span  class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td></tr>";
  }
  ?>
  </tbody>
</table>

</body>
<script src="../scripts/beheerderscripts.js"></script>
