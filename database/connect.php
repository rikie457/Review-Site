<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 16-2-2017
 * Time: 13:36
 */

namespace run;


class connect {

  private $_conn;
  private static $_instance;

  public static function getInstance() {
    if ( !self::$_instance ) {
      self::$_instance = new self();
    }

    return self::$_instance;
  }

  private function __construct() {
    try {
      $pad = $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/counter/counter.txt';
      $f = fopen($pad, "r");
      $teller = intval(fread($f, filesize($pad)));
      fclose($f);


      $configuraties = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/ini/config.ini');
      if ( $teller != 0 ) {
        $teller++;
        $f = fopen($pad, "w");
        fwrite($f, $teller);
        fclose($f);
        $this->_conn = new \PDO("mysql:host=" . $configuraties['host'] . ";dbname=" . $configuraties['dbname'] . ";", $configuraties['username'], $configuraties['password']);
      } else {
        $this->_conn = new \PDO("mysql:host=" . $configuraties['host'] . ";dbname=" . $configuraties['dbname'] . ";", $configuraties['username'], $configuraties['password']);
        $sql = "
       
SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gebruikersboek`
--
CREATE DATABASE IF NOT EXISTS `gebruikersboek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gebruikersboek`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `berichten`
--

DROP TABLE IF EXISTS `berichten`;
CREATE TABLE IF NOT EXISTS `berichten` (
  `berichtid` int(11) NOT NULL AUTO_INCREMENT,
  `berichtonderwerp` varchar(100) NOT NULL,
  `berichttekst` longtext NOT NULL,
  `score` int(11) NOT NULL,
  `gebruikerid` bigint(20) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`berichtid`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `berichten`
--

INSERT INTO `berichten` (`berichtid`, `berichtonderwerp`, `berichttekst`, `score`, `gebruikerid`, `datum`) VALUES
(159, 'Ik vond het erg leuk~!', 'het was een erg leuke avond', 0, 160, '2017-04-06 13:49:24'),
(161, 'Cool', 'Dit is een cool restaurant', 5, 162, '2017-04-06 14:11:02'),
(167, 'Goed restaurant', 'Coool', 3, 168, '2017-04-07 13:37:18'),
(168, 'Tycho', 'test', 4, 169, '2017-04-07 14:20:12'),
(169, 'Tycho', 'test', 4, 170, '2017-04-07 14:22:02');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

DROP TABLE IF EXISTS `gebruikers`;
CREATE TABLE IF NOT EXISTS `gebruikers` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `afbeeldingpath` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `voornaam`, `achternaam`, `email`, `afbeeldingpath`) VALUES
(168, 'Tycho', 'Engberink', 'semihoren@gmail.com', 'boy-512.png'),
(169, 'Tycho', 'Engberink', 'semihoren@gmail.com', ''),
(170, 'Tycho', 'Engberink', 'semihoren@gmail.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
        $teller++;
        $f = fopen($pad, "w");
        fwrite($f, $teller);
        fclose($f);
      }
    } catch ( PDOException $e ) {
      echo $e->getMessage();
    }
  }

  private function __clone() {
  }

  public function getConnectie() {

    return $this->_conn;

  }

}