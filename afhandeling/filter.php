<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/uitvoeren.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/connect.php';

use run\uitvoeren;

/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 6-4-2017
 * Time: 16:26
 */

$keuze = $_POST['value'];
if ( $keuze == NULL ) {
  $keuze = 0;
}
switch ( $keuze ) {
  case 0:
    $sql = "SELECT G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id";
    break;
  case 1:
    $sql = "SELECT G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id ORDER BY B.score ASC";
    break;
  case 2:
    $sql = "SELECT G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id ORDER BY B.score DESC";
    break;
  case 3:
    $sql = "SELECT G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id ORDER BY B.datum ASC";
    break;
  case 4:
    $sql = "SELECT G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id ORDER BY B.datum DESC";
    break;
  case 5:
    $sql = "SELECT G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id WHERE YEAR(B.datum) = 2017";
    break;
  case 6:
    $sql = "SELECT G.voornaam, G.achternaam, G.email, B.berichtonderwerp, B.berichttekst, G.afbeeldingpath, B.datum, B.score FROM gebruikers G INNER JOIN berichten B ON B.gebruikerid = G.id WHERE B.score >= 4";
    break;
}


$berichten = new uitvoeren();
$configuraties = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/ini/config.ini');

if ( $configuraties['database'] == 'ja' && $configuraties['text'] == 'nee' ) {
  $data = $berichten->verkrijgBerichten($sql);
  while ( $row = $data->fetch() ) {
    echo "<div class='bericht'>" . "<h3><b>" . $row['berichtonderwerp'] . "</b></h3><p><b>Naam</b> " . $row['voornaam'] . " " . $row["achternaam"] . "</p>
       <p><b>Email </b>" . $row['email'] . "</p>
       <p><b>Datum </b>" . $row['datum'] . "<br>" . "<p><b>Score</b> " . $row['score'] . "/5</p>" . "<img style='width:400; max-height:250px;' src='uploads/" . $row['afbeeldingpath'] . "' alt='Foto kon niet worden weergegeven'><br><p><b>Bericht</b></p>" . $row['berichttekst'] . "</div>";
  }
} elseif ( $configuraties['database'] == 'nee' && $configuraties['text'] == 'ja' ) {
  include '../schrijfbestanden/recensies.html';
}
