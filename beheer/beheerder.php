<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 6-4-2017
 * Time: 22:21
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script
    src="https://code.jquery.com/jquery-3.1.1.js"
    integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
    crossorigin="anonymous"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
  <meta charset="UTF-8">
  <title>Voer uw gegevens in.</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/formulier.css"/>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand">Beheerder inlog</a>
      <ul class="nav navbar-nav">
        <li><a href="../recensies.php">Recensies</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../formulier.php">Formulier</a></li>

      </ul>
    </div>

    </ul>

  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>
<div class="col-lg-5 inlog">
  <div class="col-lg-2"></div>
  <div class='col-lg-10' id='meldingeninlog'>

    <?php
    $pad = $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/counter/counter.txt';
    $f = fopen($pad, "r");
    $teller = intval(fread($f, filesize($pad)));
    fclose($f);

    if ( $teller == 0 ) {
      echo "
      Dit is de eerste keer inloggen dus u hoeft niks in te voeren. Ga naar instellingen voor het veranderen van het wachtwoord.";

    }

    if ( isset($_SESSION['meldingLogin']) ) {
      echo $_SESSION["meldingLogin"];
      session_destroy();
    } ?></div>
  <form id="inlogform" class="form-horizontal " method="post" action="../afhandeling/login.php">
    <div class="form-group">
      <label for="gebruiker" class="col-xs-2 control-label">Gebruikersnaam</label>
      <div class="col-xs-10">
        <input name="gebruiker" class="form-control" type="text" placeholder="Gebruiker">
      </div>
    </div>

    <div class="form-group">
      <label for="wachtwoord" class="col-xs-2 control-label">Wachtwoord</label>
      <div class="col-xs-10">
        <input name="wachtwoord" class="form-control" type="password" placeholder="Wachtwoord">
      </div>
    </div>
    <div class="form-group">
      <label for="submit" class="col-xs-2 control-label"></label>
      <div class="col-xs-2">

        <input name="sumbit" class="form-control" value="Verzenden" type="submit">
      </div>
    </div>
  </form>
</div>
<script src="scripts/jqueryscripts.js"></script>
</html>