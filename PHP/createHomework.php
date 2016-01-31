<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homework Creation</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link rel="stylesheet" type="text/css" href="../CSS/createAnnouncement.css">

    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
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
    echo "<p id='username_info'> <a href='login.php'>Login</a> </p>";

}
?>

    <header>
        <h1>Προσθήκη Εργασίας</h1>
    </header>

    <div class="left_content">
        <nav>
            <ul>
                <li> <a href="index.php"> <img src="../images/index.png"> </a> </li>
                <li> <a href="announcements.php"> <img src="../images/announcements.png"> </a>  </li>
                <li> <a href="communication.php"> <img src="../images/communication.png"> </a> </li>
                <li> <a href="documents.php"> <img src="../images/documents.png"> </a> </li>
                <li> <a href="homework.php"> <img src="../images/homework.png"> </a> </li>
            </ul>
        </nav>
    </div>

    <div class="right_content">

        <form method="get" action="">

            Στόχοι <textarea cols="30" rows="5" name="goalsBox"> </textarea> <br>
            Ημερομηνία Παράδοσης <input type="date" name="dateBox"><br>
            Παραδοτέα <textarea cols="30" rows="5" name="deliverablesBox"> </textarea> <br>
            Θέση Εργασίας <input type="text" name="locationBox"><br>
            <input type="submit" width="20">

        </form>

        <?php   //php script responsible for uploading the homework info

        session_start();


        if($_GET['goalsBox'] !=''){

            $goals = $_GET['goalsBox']; //gets the info of the homework
            $date = $_GET['dateBox'];
            $deliverables = $_GET['deliverablesBox'];
            $location = $_GET['locationBox'];

            $connect = mysql_connect("localhost","root","password");
            mysql_select_db("IEEProject",$connect);

            mysql_query("INSERT INTO Homework (deliver_date,Deliverables,Goals,File_Position) VALUES ('$date','$deliverables','$goals','$location')");
            print mysql_error($connect);

            header("Location: homework.php");

        }

        ?>

    </div>

    <footer>
        Created by Kostas Platis &copy;
    </footer>


</body>

</html>
