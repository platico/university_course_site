<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document Insertion</title>
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
        <h1>Προσθήκη Νεου Εγγραφου</h1>
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

        <form method="POST" action="uploadDocument.php" >

            Τίτλος <input type="text" name="titleBox" id="titleBox" required> <br>
            Περιγραφή <input type="text" name="descBox" id="descBox" required><br>
            Αρχείο <input type="file" name="fileBox" id="fileBox" > <br>

        </form>

    </div>

    <footer>
        Created by Kostas Platis &copy;
    </footer>

</body>

</html>

