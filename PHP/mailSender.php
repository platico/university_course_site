<?php

/**
 * php script responsible for sending mail to all Tutor users
 */


    $email = $_GET['emailBox'];
    $subject = $_GET['subjectBox'];
    $body = $_GET['bodyBox'];


    $connect = mysql_connect("localhost","root","password");
    mysql_select_db("IEEProject",$connect);
    $emails =  mysql_query("SELECT Email FROM Users WHERE Role='Tutor'");   //takes all the Tutor users
    print mysql_error($connect);

    for($i=0;$i<mysql_num_rows($emails);$i++){  //for every tutor
        $email = mysql_fetch_row($emails);
        mail($email[0],$subject,$body); //sends mail to the tutor
    }

header("Location: communication.php");