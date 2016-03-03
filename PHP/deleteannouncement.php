<?php
/**
 * php script responsible for deleting an announcement
 */

ob_start();

$id=$_GET['id'];
$connect = mysql_connect();   //requires DB credentials
mysql_select_db('IEEProject',$connect);

mysql_query("DELETE FROM Announcements WHERE ID='$id'");    //executes the deleting query

header('Location: http://platiskp.webpages.auth.gr/PHP/announcements.php');
