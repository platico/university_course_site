<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../CSS/communication.css">
        <link rel="stylesheet" type="text/css" href="../CSS/main.css">
        <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
        <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

        <title>Επικοινωνια</title>
    </head>
    <body>

    <div id="grid_layout">


            <header>
                <h1>Επικοινωνία</h1>
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
                <p>Η συγκεκριμένη ιστοσελίδα θα περιέχει δύο δυνατότητες για την αποστολή e-mail στον καθηγητή:</p>
                <ul>
                    <li>Μέσω Web φόρμας</li>
                    <li>Με χρήση e-mail διεύθυνσης</li>
                </ul>

                <h2>Αποστολή e-mail μέσω web φόρμας</h2>

                <form method="get" action="mailSender.php">
                    <table>
                        <tr>
                           <td> <input type="email" name="emailBox" placeholder="E-mail Αποστολέα" title="sender_email" required> </td>
                        </tr>
                        <tr>
                           <td> <input type="text" name="subjectBox" placeholder="Θέμα" title="subject" required> </td>
                        </tr>
                        <tr>
                           <td> <textarea placeholder="Κείμενο" name="bodyBox" title="main"></textarea> </td>
                        </tr>
                        <tr>
                            <td> <input type="submit" title="submit_button" value="Αποστολή"> </td>
                        </tr>
                    </table>

                </form>

                <h2>Αποστολή e-mail με χρήση email διεύθυνσης</h2>

                <p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a href="mailto:tutor@csd.auth.test.gr">tutor@csd.auth.test.gr</a> </p>


            </div>

        <footer>
            Created by Kostas Platis &copy;
        </footer>


    </div>



    </body>
</html>