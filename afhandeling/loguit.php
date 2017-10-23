<?php
/**
 * Created by PhpStorm.
 * User: Tycho
 * Date: 6-4-2017
 * Time: 23:29
 */
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");