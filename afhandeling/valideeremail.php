<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 9-3-2017
 * Time: 13:43
 */
$pattern = '/[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/i';
$emailaddress = $_POST['email'];
if ( preg_match($pattern, $emailaddress) === 1 ) {
  echo 'true';
} else {
  echo 'false';
}