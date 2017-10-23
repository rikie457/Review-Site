<?php
session_start();
?>
<!DOCTYPE html>
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/formulier.css"/>
  <script
    src="https://code.jquery.com/jquery-3.1.1.js"
    integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
    crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand">Recensies</a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="formulier.php">Formulier</a></li>

      </ul>
    </div>
    <?php

    if ( isset($_SESSION['gebruiker']) ) {
      ?>
      <span class="navbar-text">Ingelogd als <?php echo $_SESSION['gebruiker'] ?> </span>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="afhandeling/loguit.php">Uitloggen</a></li>
        <li><a href="./beheer/beveiligdbeheer.php">Beheerder</a></li>

      </ul>
      <?php
    } else {
      ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="beheer/beheerder.php">Login beheerder</a></li>

      </ul>
      <?php
    }
    $configuraties = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/ini/config.ini');

    if ( $configuraties['database'] == 'ja' && $configuraties['text'] == 'nee' ) {
      ?>
      <div id="filteren" class="filter navbar-right">
        <select>
          <option value='0' selected="selected">Alles laten zien</option>
          <option value='1'>Lage score naar hoog</option>
          <option value='2'>Hoge score naar laag</option>
          <option value='3'>Oudste eerst</option>
          <option value='4'>Nieuwste eerst</option>
          <option value='5'>Alleen 2017</option>
          <option value='6'>Alleen score 4 of hoger</option>
        </select>
      </div>
      <?php
    } elseif ( $configuraties['database'] == 'nee' && $configuraties['text'] == 'ja' ) {
      ?>
      <span class="navbar-text navbar-right">
    U kunt nu niet filteren (tekstbestand)
      </span>
      <?php
    }
    ?>
    </ul>

  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div id="berichten" class="col-lg-12 berichten">
</div>
<script src="scripts/jqueryscripts.js"></script>
<script src="scripts/filterscripts.js">
</script>
</body>