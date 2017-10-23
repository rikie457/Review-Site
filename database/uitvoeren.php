<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 16-2-2017
 * Time: 13:37
 */

namespace run;

use run\connect as connector;

class uitvoeren {
  public function __construct() {

    $db = connector::getInstance();
    $this->_dbc = $db->getConnectie();
  }

  public function verkrijgBerichten( $sql ) {
    try {
      $stmt = $this->_dbc->prepare($sql);
      $stmt->execute();

      return $stmt;
    } catch ( PDOException $e ) {
      echo $e->getMessage();
    }
  }

  public function verstuurBerichten( $sql, $array ) {
    try {

      $configuraties = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/ini/config.ini');
      if ( $configuraties['database'] == 'ja' && $configuraties['text'] == 'nee' ) {
        $stmt = $this->_dbc->prepare($sql);
        $stmt->execute($array);

      } elseif ( $configuraties['database'] == 'nee' && $configuraties['text'] == 'ja' ) {
        $schrijfbestand = '../schrijfbestanden/recensies.html';
        $data = "<div class='bericht'>" . "<p><b>Naam</b> " . $array['voornaam'] . " " . $array["achternaam"] . "</p><p><b>Email </b>" . $array['email'] . "</p><p><b>Datum </b>" . date('Y-m-d h:i:s') . "<br>" . "<p><b>Score</b> " . $array['score'] . "/5</p>" . "<img style='width:400; max-height:250px;' src='uploads/" . $array['afbeeldingpath'] . "' alt='foto'><br><p><b>Onderwerp </b>" . $array['berichtonderwerp'] . "</p><br><p><b>Bericht</b></p>" . $array['bericht'] . "</div>";
        $bestand = fopen($schrijfbestand, 'a') or die('Kon bestand niet openen');
        fwrite($bestand, $data);
        fclose($bestand);
      }
    } catch ( PDOException $e ) {
      echo $e->getMessage();
    }
  }

  public function verwijderBerichten( $sql, $array ) {
    try {
      $stmt = $this->_dbc->prepare($sql);
      $stmt->execute($array);

    } catch ( PDOException $e ) {
      echo $e->getMessage();
    }
  }

  public function bewerkBerichten( $sql, $array ) {
    try {
      $stmt = $this->_dbc->prepare($sql);
      $stmt->execute($array);

    } catch ( PDOException $e ) {
      echo $e->getMessage();
    }
  }
}

