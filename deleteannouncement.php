<?php

    $id=$_GET['id'];
    $connect = mysql_connect('localhost','root','password');
    mysql_select_db('IEEProject',$connect);

    mysql_query("DELETE FROM Announcements WHERE ID='$id'");

    header('Location: announcements.php');