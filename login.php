<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">

    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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

    <header>
        <h1>Login</h1>
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


        <?php

        session_start();


        if($_GET['usernameBox'] !=''){
                $email = $_REQUEST['usernameBox'];
                $password = $_REQUEST['passwordBox'];



                $connect = mysql_connect('localhost','root','password');

                mysql_select_db('IEEProject',$connect);

                $results = mysql_query("SELECT * FROM Users WHERE Email='$email' AND Password='$password'"); //queries the user info
                print mysql_error($connect);


                if(mysql_num_rows($results) == 0){  //if no user found
                    echo "<h3 id='wrong_login'>The username or password that you've entered are incorrect. Try again.</h3>";    //prints message of wrong user info
                }
                else{
                    echo "<h3 id='correct_login'>You are now logged in. You will be automatically redirected</h3>";   //prints message and redirects after 2 seconds
                    $user = mysql_fetch_row($results);  //gets the user
                    $firstName = $user[0];
                    $lastName = $user[1];
                    $role = $user[4];

                    $_SESSION['connected'] = 'true';
                    $_SESSION['name'] = $firstName.' '.$lastName;
                    if($role == 'Tutor'){
                        $_SESSION['role'] = 'Tutor';
                    }
                    else{
                        $_SESSION['role'] = 'Student';
                    }

                    header('Refresh: 1; URL=index.php');
                }

            }

        ?>




        <form method="get" action="">
            Username :
            <input type="email" name="usernameBox" required/> <br>
            Password :
            <input type="password" name="passwordBox" required/> <br>
            <input type="submit" name="submit" value="Submit"/>
        </form>

    </div>

    <footer>
        <p> Created by Kostas Platis &copy; </p>
    </footer>

</body>

</html>