<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 7-4-2017
 * Time: 11:22
 */
function debug( $debug ) {
  echo '
<div class="debug">
    <div>
        <h3>-- Debug --</h3>
        <pre>';
  print_r($debug);
  echo '</pre>
    </div>
    <div>
        <h3>-- Post --</h3>
        <pre>';
  print_r($_POST);
  echo '</pre>
    </div>
    <div>
        <h3>-- Get --</h3>
        <pre>';
  print_r($_GET);
  echo '</pre>
    </div>
    <div>
        <h3>-- Session --</h3>
        <pre>';
  print_r($_SESSION);
  echo '</pre>
    </div>
    <div>
        <h3>-- Files --</h3>
        <pre>';
  print_r($_FILES);
  echo '</pre>
    </div>
</div>';
  exit;
}