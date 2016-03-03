<?php
ob_start();

var_dump($_FILES);


$folder = '../docs';
$filename = $_FILES['fileBox']['name'];
print 'file = '.$filename;
$tmpName  = $_FILES['fileBox']['tmp_name'];
$description = $_POST['descBox'];
$title = $_POST['titleBox'];
$position = $folder . '/' . $filename;
print $position;

if (move_uploaded_file($tmpName, $position)) {
    echo 'File was uploaded';
}
else {
    echo 'File was not uploaded';
}


/*
    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    print $content;
    fclose($fp);
*/
$connect = mysql_connect();   //requires DB credentials
mysql_select_db('IEEProject',$connect);
mysql_query("INSERT INTO Files (Title,Description,File) VALUES ('$title','$description','$position')" );
print mysql_error($connect);

header('Location: http://platiskp.webpages.auth.gr/PHP/documents.php');

