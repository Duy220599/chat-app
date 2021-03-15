<?php
session_start();
$connection = mysqli_connect("localhost","root","","mychat") or die("Connection failed");
    if(isset($_POST['sign_in'])){
       
        $email = htmlentities(mysqli_real_escape_string($connection,$_POST['email']));
        $pass = htmlentities(mysqli_real_escape_string($connection,$_POST['password']));
        
        $select_user = " SELECT * FROM users WHERE user_email='$email' AND user_pass='$pass' ";
        $query = mysqli_query($connection,$select_user);
        $check_user=mysqli_num_rows($query);
        if($check_user == 1) {
            $_SESSION['user_email']= $email;
            $update_status=mysqli_query($connection," UPDATE users SET log_in='Online' WHERE user_email='$email' ");
            $user = $_SESSION['user_email'];
            $get_user=" SELECT * FROM users WHERE  user_email = '$user' ";
            $run_user = mysqli_query($connection,$get_user);
            $row= mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];

            echo "<script> window.open('home.php?user_name=$user_name', '_self'</script>";
        }
        else{
            echo" 
            <div class='alert alert-danger'>
                <strong>Check your email and password plz </strong>
            </div>
            ";
        }
    }
?>
