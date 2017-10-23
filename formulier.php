<?php
include 'database/uitvoeren.php';
include 'database/connect.php';

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

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/formulier.css"/>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand">Formulier</a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="recensies.php">Recensies</a></li>

      </ul>
    </div>
    <?php
    if ( isset($_SESSION['gebruiker']) ) {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./beheer/beveiligdbeheer.php">Beheerder</a></li>

      </ul>
      <span class="navbar-text">Ingelogd als <?php echo $_SESSION['gebruiker'] ?> </span>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="afhandeling/loguit.php">Uitloggen</a></li>

      </ul>
      <?php
    } else {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="beheer/beheerder.php">Login beheerder</a></li>

      </ul>
      <?php
    }
    ?>


    </ul>

  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="col-lg-2">
</div>
<div class="formback col-lg-8">
  <form id="nieuwbericht" class="form-horizontal" name="nieuwbericht" action="afhandeling/nieuwbericht.php "
        method="post" enctype="multipart/form-data">

    <div class="form-group pt-5">
      <label for="voornaam" class="col-xs-2 control-label">Voornaam</label>
      <div class="col-xs-10">
        <input name="voornaam" class="form-control" type="text" placeholder="Voornaam">
      </div>
    </div>

    <div class="form-group">
      <label for="achternaam" class="col-xs-2 control-label">Achternaam</label>
      <div class="col-xs-10">
        <input name="achternaam" class="form-control" type="text" placeholder="Achternaam">
      </div>
    </div>

    <div class="form-group">
      <label for="emailextra" class="col-xs-2 control-label">Email</label>
      <div class="col-xs-10">
        <input name="emailextra" class="form-control" type="text" placeholder="Email">
      </div>
      <span id="error"></span>
    </div>


    <div class="form-group">
      <label for="berichtonderwerp" class="col-xs-2 control-label">Berichtonderwerp</label>
      <div class="col-xs-10">
        <input name="berichtonderwerp" class="form-control" placeholder="Berichtonderwerp">
      </div>
    </div>

    <div class="form-group">
      <label for="bericht" class="col-xs-2 control-label">Bericht</label>
      <div class="col-xs-10">
        <textarea name="bericht" class="form-control" cols="50" rows="4" placeholder="Bericht"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label for="upload" class="col-xs-2 file">Foto uploaden</label>
      <div class="col-xs-10">
        <input name="afbeelding" class="file-input" type="file">
        <span class="file-control"></span>
      </div>
    </div>

    <div class="form-group">
      <label for="star" class="col-xs-2 stars control-label">Score</label>
      <div class="col-xs-3">
        <input class="star star-5" id="star-5" type="radio" value="5" name="score"/>
        <label class="star star-5" for="star-5"></label>
        <input class="star star-4" id="star-4" type="radio" value="4" name="score"/>
        <label class="star star-4" for="star-4"></label>
        <input class="star star-3" id="star-3" type="radio" value="3" name="score"/>
        <label class="star star-3" for="star-3"></label>
        <input class="star star-2" id="star-2" type="radio" value="2" name="score"/>
        <label class="star star-2" for="star-2"></label>
        <input class="star star-1" id="star-1" type="radio" value="1" name="score"/>
        <label class="star star-1" for="star-1"></label>
      </div>
      <div class="col-xs-7"></div>
    </div>

    <div class="form-group">
      <label for="submit" class="col-xs-2 control-label"></label>
      <div class="col-xs-10">
        <button name="sumbit" class="btn btn-primary" type="submit">Verstuur</button>
      </div>
    </div>
  </form>
</div>
<div class="col-lg-2">
</div>
</body>
<script src="scripts/jqueryscripts.js"></script>
</html>