<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/uitvoeren.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/debug/debug.php';
use run\uitvoeren;

/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 7-4-2017
 * Time: 11:57
 */
$berichten = new uitvoeren();

var_dump($_POST);
$id = $_POST['id'];
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$berichttekst = $_POST['berichttekst'];
$berichtonderwerp = $_POST['berichtonderwerp'];
$score = $_POST['score'];
$afbeeldingpath = $_POST['afbeeldingpath'];

$bewerkarray = array(
  "id"               => $id,
  "voornaam"         => $voornaam,
  "achternaam"       => $achternaam,
  "email"            => $email,
  "berichtonderwerp" => $berichtonderwerp,
  "berichttekst"     => $berichttekst,
  "afbeeldingpath"   => $afbeeldingpath,
  "score"            => $score );

$berichten->bewerkBerichten("
SET @id = :id;
UPDATE gebruikers
SET voornaam=:voornaam, achternaam=:achternaam, email=:email, afbeeldingpath=:afbeeldingpath
WHERE id=@id;

UPDATE berichten
SET berichtonderwerp=:berichtonderwerp, berichttekst=:berichttekst, score=:score
WHERE gebruikerid=@id;                          
                              ", $bewerkarray);