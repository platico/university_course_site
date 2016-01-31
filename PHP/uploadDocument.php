<?php

if(empty($_SERVER['CONTENT_TYPE']))
{
    $_SERVER['CONTENT_TYPE'] = "application/x-www-form-urlencoded";
}






    print_r($_POST);




$filename = $_FILES['fileBox']['name'];
    $tmpName  = $_FILES['fileBox']['tmp_name'];


    $description = $_POST['descBox'];
    $title = $_POST['titleBox'];



    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    print $content;
    fclose($fp);

    $connect = mysql_connect('localhost','root','password');
    mysql_select_db('IEEProject',$connect);
    mysql_query("INSERT INTO Files (Title,Description,File) VALUES ('$title','$description','$content')" );
    print mysql_error($connect);


