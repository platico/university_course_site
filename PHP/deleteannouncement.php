<?php
/**
 * php script responsible for deleting an announcement
 */

    $id=$_GET['id'];
    $connect = mysql_connect('localhost','root','password');
    mysql_select_db('IEEProject',$connect);

    mysql_query("DELETE FROM Announcements WHERE ID='$id'");    //executes the deleting query

    header('Location: announcements.php');