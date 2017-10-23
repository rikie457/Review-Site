<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/uitvoeren.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPpraktijk/database/connect.php';
use run\uitvoeren;

/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 7-4-2017
 * Time: 11:57
 */
$berichten = new uitvoeren();

$verwijderarray = array( "verwijderid" => $_POST['verwijderid'] );
$berichten->verwijderBerichten("DELETE g ,b FROM gebruikers g INNER JOIN berichten b ON g.id = b.gebruikerid WHERE gebruikerid = :verwijderid ", $verwijderarray);