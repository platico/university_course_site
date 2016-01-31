<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Announcement Creation</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link rel="stylesheet" type="text/css" href="../CSS/createAnnouncement.css">

    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<body>

<?php   //php script that shows the user info in the upper right position


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
    <h1>Προσθήκη Ανακοίνωσης</h1>
</header>

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

    <form method="POST" action="">

        Ημερομηνία <input type="date" name="dateBox"> <br>
        Θέμα <input type="text" name="subjectBox" required> <br>
        <textarea name="bodyBox"  cols="50" rows="15" required> </textarea> <br>
        <input type="submit" width="20">

    </form>

    <?php  //php scripts responsible for uploading the announcement info

    session_start();


    if($_POST['subjectBox'] !=''){

        $subject = $_POST['subjectBox']; //gets the infos given by the user
        $body = $_POST['bodyBox'];
        $date = $_POST['dateBox'];

        $connect = mysql_connect("webpagesdb.it.auth.gr:3306","ieeroot","password");
        mysql_select_db("IEEProject",$connect);

        mysql_query("INSERT INTO Announcements (Subject,Date_Field,Body) VALUES ('$subject','$date','$body')");
        print mysql_error($connect);

        header("Location: announcements.php");  //redirects the user in the announcements page

    }

    ?>

</div>

<footer>
    Created by Kostas Platis &copy;
</footer>


</body>

</html>

