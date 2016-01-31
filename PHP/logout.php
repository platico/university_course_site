<?php
/**
 * php script that logouts the user
 */


session_start();


$_SESSION["connected"] = 'false';
header('Location: index.php');
