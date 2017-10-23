<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 7-4-2017
 * Time: 14:51
 */

include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/uitvoeren.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/connect.php';

use run\uitvoeren;

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
          crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <title>Beheerder Instellingen</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/formulier.css"/>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand">Beheerder Instellingen</a>
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
        <li><a href="beveiligdbeheer.php">Aanpassen</a></li>

      </ul>
      <?php
    } else {
    }
    ?>

    </ul>

  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="col-lg-5 inlog">
  <?php


  $filepath = $filepath = $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/ini/config.ini';


  if ( $_POST ) {
    $data = $_POST;

    update_ini_file($data, $filepath);
  }


  function update_ini_file( $data, $filepath ) {
    $content = "";

    $parsed_ini = parse_ini_file($filepath, TRUE);

    foreach ( $data as $section => $values ) {

      $content .= "[" . $section . "]\n";

      foreach ( $values as $key => $value ) {
        $content .= $key . "=" . $value . "\n";
      }
    }


    if ( !$handle = fopen($filepath, 'w') ) {
      return FALSE;
    }

    $success = fwrite($handle, $content);
    fclose($handle);

    return $success;
  }

  $parsed_ini = parse_ini_file($filepath, TRUE);

  ?>
  <form action="" class="form-horizontal" method="post">
    <?php

    foreach ( $parsed_ini as $section => $values ) {
      echo "<h3>" . str_replace('_', ' ', $section) . "</h3>";

      echo "<input type='hidden' value='$section' name='$section' />";

      foreach ( $values as $key => $value ) {
        echo "<div class='form-group'><label for='{$section}[$key]' class='col-xs-2 control-label'>" . $key . "</label><div class='col-xs-10'><input class='form-control' type='text' name='{$section}[$key]' value='$value' /></div></div>";
      }
      echo "<br>";
    }

    ?>
    <div class="form-group">
      <label for="submit" class="col-xs-2 control-label"></label>
      <div class="col-xs-2">
        <input type="submit" class='btn btn-primary' value="Update config.ini"/>
      </div>
    </div>
  </form>
  <?php

  ?>

  <div class="resetcount">
    <button type="button" class='btn btn-primary' onclick="resetCounter();">Zet database connect op 0</button>
  </div>
</div>
</body>
</html>
</div>
</body>
<script src="../scripts/beheerderscripts.js"></script>
