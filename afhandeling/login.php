<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 6-4-2017
 * Time: 22:24
 */
session_start();

$configuraties = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/ini/config.ini');
$gebruikersnaam = $configuraties['gebruikersnaam'];
$wachtwoord = $configuraties['wachtwoord'];

if ( isset($_POST['gebruiker'], $_POST['wachtwoord']) ) {
  $ingevoerdegebruikersnaam = $_POST['gebruiker'];
  $ingevoerdewachtwoord = $_POST['wachtwoord'];
  if ( $ingevoerdegebruikersnaam == $gebruikersnaam && $ingevoerdewachtwoord == $wachtwoord ) {

    $_SESSION['ingelogd'] = TRUE;
    $_SESSION['gebruiker'] = $ingevoerdegebruikersnaam;

    header('Location: ../beheer/beveiligdbeheer.php');

  } else {
    $_SESSION["meldingLogin"] = "<p style='color: red'>Gebruikersnaam of wachtwoord komt niet overeen</p>";
    header("Location: ../beheer/beheerder.php");
  }
} else {
  $_SESSION["meldingLogin"] = "<p style='color: red'>U heeft niet alles ingevuld!</p>";
  header("Location: ../beheer/beheerder.php");
}