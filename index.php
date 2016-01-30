<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/index.css">
        <link rel="stylesheet" type="text/css" href="CSS/main.css">
        <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">


        <title>Αρχική Σελίδα</title>
    </head>
    <body>
        <?php
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
        <div id="grid_layout">

            <header>
                <h1>Αρχική Σελίδα</h1>
            </header>

            <div class="left_content">
                <nav>
                    <ul>
                        <li> <a href="index.php"> <img src="images/index.png"> </a> </li>
                        <li> <a href="announcements.php"> <img src="images/announcements.png"> </a>  </li>
                        <li> <a href="communication.html"> <img src="images/communication.png"> </a> </li>
                        <li> <a href="documents.html"> <img src="images/documents.png"> </a> </li>
                        <li> <a href="homework.html"> <img src="images/homework.png"> </a> </li>
                    </ul>
                </nav>
            </div>

            <div class="right_content">
                <p>Καλως ορίσατε στον ιστόχώρο εκμάθησης HTML.</p>
                <p> <b>Ο ιστοχώρος μας περιέχει σελίδες σχετικά με :</b></p>
                <ul>
                    <li> <b>Ανακοινώσεις</b>: Θα βρείτε ανακοινώσεις σχετικά με το μάθημα</li>
                    <li> <b>Επικοινωνία</b>: Θα βρείτε στοιχεία επικοινωνίας με τον καθηγητή του μαθήματος</li>
                    <li> <b>Έγγραφα</b>: Θα βρείτε εγγραφά σχετικά με το μάθημα</li>
                    <li> <b>Εργασίες</b>: Θα βρείτε πληροφορίες και εκφωνήσεις για τις εργασίες που έχουν ανακοινωθεί</li>
                </ul>

                <img src="images/html_logo.png">
            </div>


        </div>

        <footer>
            <p> Created by Kostas Platis &copy; </p>
        </footer>

    </body>
</html>