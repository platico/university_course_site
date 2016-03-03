<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link rel="stylesheet" type="text/css" href="../CSS/homework.css">
    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <title>Εργασίες</title>
</head>
<body>


<?php   //php script that shows the user info in the upper right position
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
        <h1>Εργασίες</h1>
    </header>

    <?php
    if ($isConnected=="true" && $role=='Tutor'){    //if a user is connected and it's role is Tutor
        echo "
                    <a href=\"http://platiskp.webpages.auth.gr/PHP/createHomework.php\">Προσθήκη Νέας Εργασίας</a>
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

        <?php   //php fetcher for homeworks

        $connect = mysql_connect();    //db connection -requires DB credentials

        mysql_select_db('IEEProject',$connect);

        $homeworks = mysql_query("SELECT * FROM Homework");
        print mysql_error($connect);


        for($i=1;$i<=mysql_num_rows($homeworks);$i++){  //for every homework

            $homework = mysql_fetch_row($homeworks);    //gets the info
            $id = $homework[0];
            $file_position = $homework[1];
            $deliverables = $homework[3];
            $date = $homework[2];
            $goals = $homework[4];

            echo"<h2>Εργασία $i";


            echo"</h2>
                     <table>
                        <tr>
                            <td> <b>Ημερομηνία:</b> </td>
                            <td> $date </td>
                        </tr>
                        <tr>
                            <td> <b>Παραδοτέα:</b></td>
                            <td>$deliverables</td>
                        </tr>
                        <tr>
                            <td> <b>Στόχοι:</b></td>
                            <td>$goals</td>
                        </tr>
                            <td> <b>Εκφώνηση:</b></td>
                            <td> Κατεβάστε την εκφώνηση της εργασίας από <a href='$file_position' download>εδώ</a></td>
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


</div>



</body>

</html>
