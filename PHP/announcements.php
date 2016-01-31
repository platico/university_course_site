<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' type='text/css' href='../CSS/announcements.css'>
    <link rel='stylesheet' type='text/css' href='../CSS/main.css'>
    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel='icon' href='../images/favicon.ico' type='image/x-icon'>

    <title>Ανακοινώσεις</title>
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


<div id='grid_layout'>

    <header id='#top'>
        <h1>Ανακοινώσεις</h1>
    </header>

    <?php
    if ($isConnected=="true" && $role=='Tutor'){    //if a user is connected and it's role is Tutor
        echo "
                    <a href=\"createAnnouncement.php\">Προσθήκη Νέας Ανακοίνωσης</a>
                ";
    }
    ?>


    <div class='left_content'>
        <nav>
            <ul>
                <li> <a href='../index.php'> <img src='../images/index.png'> </a> </li>
                <li> <a href='announcements.php'> <img src='../images/announcements.png'> </a>  </li>
                <li> <a href='communication.php'> <img src='../images/communication.png'> </a> </li>
                <li> <a href='documents.php'>  <img src='../images/documents.png'> </a> </li>
                <li> <a href='homework.php'> <img src='../images/homework.png'> </a> </li>
            </ul>
        </nav>
    </div>

    <div class='right_content'>

        <?php

        $connect = mysql_connect('webpagesdb.it.auth.gr:3306','ieeroot','password');

        mysql_select_db('IEEProject',$connect);

        $announcements = mysql_query("SELECT * FROM Announcements");
        print mysql_error($connect);


        for($i=1;$i<=mysql_num_rows($announcements);$i++){  //for every announcement

            $announcement = mysql_fetch_row($announcements);    //gets the info
            $id = $announcement[0];
            $subject = $announcement[1];
            $date = $announcement[2];
            $body = $announcement[3];

            echo"<h2>Ανακοίνωση $i";
            if($role == 'Tutor'){   //if the logined user is a tutor
                echo "<a href='deleteannouncement.php?id=$id'>Διαγραφή</a> <a href='updateannouncement.php?id=$id'>Επεξεργασία</a> ";
            }

            echo"</h2>
                     <table>
                        <tr>
                            <td> <b>Ημερομηνία:</b> </td>
                            <td> $date </td>
                        </tr>
                        <tr>
                            <td> <b>Θέμα:</b></td>
                            <td>$subject</td>
                        </tr>
                        <tr>
                            <td colspan='2'>$body</td>
                        </tr>
                    </table>
                ";
        }

        ?>
        <a id="top_button" href="#top"> <img src="../images/top-button.png"> </a>

    </div>

    <footer>
        Created by Kostas Platis &copy;
    </footer>


</body>
</html>