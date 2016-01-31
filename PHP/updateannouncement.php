<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' type='text/css' href='../CSS/updateannouncement.css'>
    <link rel='stylesheet' type='text/css' href='../CSS/main.css'>
    <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700&subset=latin,greek' rel='stylesheet' type='text/css'>
    <link rel='icon' href='../images/favicon.ico' type='image/x-icon'>

    <title>Ανακοινώσεις</title>
</head>
<body>

<header id='#top'>
    <h1>Επεξεργασία </h1>
</header>

<section>

    <?php



    $id = $_GET['id'];  //if its load gets the id
    $annID = $_GET['idBox'];    //annID is used for the updating form
    $connect = mysql_connect('webpagesdb.it.auth.gr:3306','ieeroot','password');
    mysql_select_db('IEEProject',$connect);

    $announcements = mysql_query("SELECT Subject,Date_Field,Body FROM Announcements WHERE ID='$id'"); //gets the info of the announcement
    $announcement = mysql_fetch_row($announcements);
    $subject = $announcement[0];
    $date = $announcement[1];
    $body = $announcement[2];

    if(isset( $_GET['subjectBox'])){   //updates the announcement

        $newSubject= $_GET['subjectBox'];
        $newDate = $_GET['dateBox'];
        $newBody = $_GET['bodyBox'];


        $query = "UPDATE Announcements SET Subject='$newSubject', Date_Field='$newDate', Body='$newBody' WHERE ID='$annID' ";   //update query
        mysql_query($query) or die("Query failed.");
        print mysql_error($connect);

        header('Location: announcements.php');  //redirects back to announcements

    }


    ?>

    <form action="" method="get">
        ID: <input type="number" name="idBox" value='<?php echo $id; ?>' readonly> </br>
        Θέμα: <input type='text' name='subjectBox' value='<?php echo $subject; ?>' /> <br>
        Ημερομηνία:  <input type='text' name='dateBox' value='<?php echo $date; ?>'/> <br>
        <textarea rows="20" cols="50"  name='bodyBox'  > <?php echo $body; ?> </textarea> <br>
        <input type='submit' name="submit" value='Update'/>
    </form>



</section>

<footer>
    Created by Kostas Platis &copy;
</footer>


</body>
</html>





