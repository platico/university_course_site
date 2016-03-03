<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link rel="stylesheet" type="text/css" href="../CSS/documents.css">
    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">


    <title>Έγγραφα Μαθήματος</title>
</head>
<body>



<?php //php script that shows the user info in the upper right position
session_start();


$isConnected = $_SESSION['connected'];
if($isConnected=='true'){
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
    echo "<p id='username_info'>Hello <span id='username'>$name</span> ! Your role is: $role <br> <a href='logout.php ' id='log_out'>Log Out</a> </p> ";
}
else{
    $role = $_SESSION['Student'];
    echo "<p id='username_info'> <a href='login.php'>Login</a> </p>";

}

?>

<div id="grid_layout">


    <header id="#top">
        <h1>Έγγραφα Μαθήματος</h1>
    </header>

    <?php
    if ($isConnected=="true" && $role=='Tutor'){    //if a user is connected and it's role is Tutor
        echo "
                    <a href=\"addDocument.php\">Προσθήκη Νέου Εγγράφου</a>
                ";
    }
    ?>

    <div class="left_content">
        <nav>
            <ul>
                <li> <a href="../index.php"> <img src="../images/index.png"> </a> </li>
                <li> <a href="announcements.php"> <img src="../images/announcements.png"> </a>  </li>
                <li> <a href="communication.php"> <img src="../images/communication.png"> </a> </li>
                <li> <a href="documents.php"> <img src="../images/documents.png"> </a> </li>
                <li> <a href="homework.php"> <img src="../images/homework.png"> </a> </li>
            </ul>
        </nav>
    </div>

    <div class="right_content">
        <?php   //php fetcher of files

        $connect = mysql_connect(); //requires DB credentials

        mysql_select_db('IEEProject',$connect);

        $files = mysql_query("SELECT * FROM Files");    //fetches all files from DB
        print mysql_error($connect);


        for($i=1;$i<=mysql_num_rows($files);$i++){  //for every file

            $file = mysql_fetch_row($files);    //gets the info

            $title = $file[1];
            $description = $file[2];
            $location = $file[3];


            echo"<h2>Έγγραφο $i";


            echo"</h2>
                     <table>
                        <tr>
                            <td> <b>Τίτλος:</b> </td>
                            <td> $title </td>
                        </tr>
                        <tr>
                            <td> <b>Περιγραφή:</b></td>
                            <td>$description</td>
                        </tr>
                        <tr>
                            <td> <b>Αρχείο:</b></td>
                            <td><a href='$location' download>Download file</a></td>

                    </table>
                ";
        }

        ?>

        <a id="top_button" href="#top"> <img src="../images/top-button.png"> </a>

    </div>

</div>

<footer>
    Created by Kostas Platis &copy;
</footer>

</body>
</html>
