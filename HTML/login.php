<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">

    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>

    <section>

        <form method="get" action="../PHP/login_submit.php">
            Username :
            <input type="email" name="usernameBox" required/> <br>
            Password :
            <input type="password" name="passwordBox" required/> <br>
            <input type="submit" value="Submit"/>
        </form>

    </section>

    <footer>
        <p> Created by Kostas Platis &copy; </p>
    </footer>

</body>
</html>