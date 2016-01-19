<?php




    if(isset($_REQUEST['usernameBox']) ){

            $connect = mysqli_connect('localhost',"root","password");  //connects with DB

            if($connect==false){
                echo "<script>alert('Failed to connect with DB');</script>";    //failure message
            }
            else{

                mysqli_select_db($connect,"IEEProject");    //selects the DB

                echo "<script>alert('Connected with DB');</script>";    //failure message


                $username = $_REQUEST['usernameBox'];

                $password = $_REQUEST['passwordBox'];

                $insert_query = "SELECT * FROM User WHERE Email = '$username' AND Password = '$password' ";    //inserts data in DB

                $result = mysqli_query($connect,$insert_query);

                if($result==true){
                    echo "<script>alert('Query Successful');</script>";    //failure message
                }
                else{
                    echo "<script>alert('Query Failed');</script>";    //failure message
                }

                //$results_count = mysqli_num_rows($result);

               // echo $result;

               // echo "<script>alert($results_count);</script>";    //failure message

            }
            mysqli_close($connect);
        }
    else{
        echo "<script>alert('Its not set!');</script>";    //failure message
    }








