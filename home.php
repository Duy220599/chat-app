<!DOCTYPE  html>
<?php 
session_start();
include("include/connection.php");

?>
<html>
<head>
    <title> Home
            </title>
            <meta charset="utf-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" type='text/css' href="css/signup.css">
  <link rel="stylesheet" type='text/css' href="css/home.css">

</head>
<body>
    <div class="container main-section">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                    <div class="input-group-searchbox">
                        <div class="input-group-btn">
                        <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add new user</button></a>
                        </center>
                        </div>
                    </div>
                    <div class="left-chat">
                        <ul>
                            <?php include("include/get_users_data.php"); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                    <div class="row">
                    <!-- getting the user information who is logging in-->
                        <?php
                            $user = $_SESSION['user_email'];
                            $get_user = "SELECT * FROM users WHERE user_email= '$user' ";
                            $run_user = mysqli_query($connection,$get_user);
                            $row =mysqli_fetch_array($run_user);
                            $user_id =$row['user_id'];
                            $user_name =$row['user_name'];
                        ?>

                    <!-- getting the user's data on which user click-->
                        <?php
                            if(isset($_GET['user_name'])){
                                global $connection;
                                $get_username = $_GET('user_name');
                                $get_user= " SELECT * FROM users WHERE user_name='$get_username'";
                                $run_user =  mysqli_query($connection,$get_user);
                                $row_user = mysqli_fetch_array($run_user);
                                $username= $row_user('user_name');
                                $user_profile_image =$row_user('user_profile');

                                }
                                $total_messages = " SELECT * FROM users_chat WHERE (sender_username ='$user_name' AND receiver_username ='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
                                $run_messages =mysqli_query($connection,$total_messages);
                                $total = mysqli_num_rows($run_messages);
                        ?>
                        <div class="col-md-12 right-header">
                            <div class="right-header-img">
                                <img src="<?php echo "$user_profile_image";?>> 
                            </div>
                            <div class="right-header-detail">
                                <form method="post">
                                    <p><?php echo"$username"; ?></p>
                                    <span><?php echo $total; ?> messages </span>&nbsp 
                                    <button name="logout" class="btn btn-danger"> Logout </button>
                                </form>
                                <?php 
                                    if(isset($_POST['logout'])){
                                        $update_msg = mysqli_query($connection," UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");
                                        header("location:logout.php");
                                        exit();
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                    <div id="scrolling_to_bottom" class="col-md-12 right-headercontentChat">
                                        <?php
                                                $update_msg = mysqli_query($connection,"UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name' ");

                                                $sel_msg="SELECT * FROM user_chats WHERE (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
                                                $run_msg =mysqli_query($connection,$sel_msg);
                                                while ($row =mysqli_fetch_array(($run_msg))){
                                                     $sender_username =$row['sender_username'];
                                                     $receiver_username=$row['receiver_username'];
                                                     $msg_content=$row['msg_content'];
                                                     $msg_date=$row['msg_date'];
                                                }
                                        ?>
                                        <ul>
                                                <?php 
                                                    if($user_name == $sender_username AND $username == $receiver_username){

                                                        echo"
                                                            <li>
                                                                <div class= 'rightside-right-chat'>
                                                                    <span>$username <small> $msg_date </small></span><br></br>
                                                                    <p>$msg_content</p>
                                                                </div>
                                                            </li>

                                                        ";
                                                    }

                                                    else if($user_name == $receiver_username AND $username == $sender_username){

                                                        echo"
                                                            <li>
                                                                <div class= 'rightside-left-chat'>
                                                                    <span>$username <small> $msg_date </small></span><br></br>
                                                                    <p>$msg_content</p>
                                                                </div>
                                                            </li>

                                                        ";
                                                    }
                                                ?>
                                        </ul>
                                        <?php
                                        ?>
                                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 right-chat-textbox">
                                <form method="post">
                                    <input autocomplete="off" type="text" name="msg_content" placeholder=
                                    "Write your message here <3....">
                                    <button class="btn" name="submit" ><i class="fa fa-telegram"></i> </button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
                $msg=htmlentities(($_POST['msg_content']));
                if($msg=""){
                    echo"<div class='alert alert danger'>
                        <strong><center>Message was unable to sends.Plz fill something :3</center></strong>
                        </div>
                    ";
                }
                else if(strlen($msg)>100){
                    echo"<div class='alert alert danger'>
                        <strong><center>Message was too long.Use only 100 characters :3</center></strong>
                        </div>
                    ";
                    }
                else {
                    $insert ="INSERT INTO users_chats(sender_username,receiver_username,msg_content,msg_status,msg_date) VALUES('$user_name','$username','$msg','unread',NOW())";
                    $run_insert = mysqli_query($connection,$insert);
                    }
        }
    ?>
    <script>
        $('#scrolling_to_bottom').animate({
            scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight},1000);
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var height = $(window).height();
                $('.left-chat').css('height', (height - 92)* 'px');
                $('.right-header-contentChat').css('height',(height-163)* 'px');
            });
    </script>
</body>
</html>