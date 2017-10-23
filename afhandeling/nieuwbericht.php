<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/uitvoeren.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/afhandeling/upload.php';
use run\uitvoeren;

/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 23-2-2017
 * Time: 14:35
 */
session_start();
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['emailextra'];
$bericht = $_POST['bericht'];
$berichtonderwerp = $_POST['berichtonderwerp'];
$score = $_POST['score'];
$_SESSION['afbeelding'] = $_FILES['afbeelding'];
$afbeeldingpath = $_FILES['afbeelding']['name'];

if ( "" == trim($_POST['voornaam']) or "" == trim($_POST['achternaam']) or "" == trim($_POST['emailextra']) or "" == trim($_POST['bericht']) or "" == trim($_POST['berichtonderwerp']) ) {
  header('Location: fout.php');
} else {

  $verstuurarray = array(
    "voornaam"         => $voornaam,
    "achternaam"       => $achternaam,
    "email"            => $email,
    "berichtonderwerp" => $berichtonderwerp,
    "bericht"          => $bericht,
    "afbeeldingpath"   => $afbeeldingpath,
    "score"            => $score );


  upload();
  $berichten = new uitvoeren();
  $berichten->verstuurBerichten("INSERT INTO gebruikersboek.gebruikers(voornaam, achternaam, email, afbeeldingpath) VALUES (:voornaam, :achternaam, :email, :afbeeldingpath);
SET  @lastinsertedid = LAST_INSERT_ID();
INSERT INTO gebruikersboek.berichten(berichtonderwerp, berichttekst, gebruikerid, score) VALUES (:berichtonderwerp,:bericht,@lastinsertedid, :score);", $verstuurarray);
  header('Location: ../recensies.php');
}